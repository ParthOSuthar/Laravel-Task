<?php

namespace App\Http\Controllers;

use App\Events\UserRegistered;
use App\Jobs\SendWelcomeEmail;
use App\Models\Accesstype;
use App\Models\Image;
use App\Models\UserAccessType;
use App\Models\Userdata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class DataController extends Controller
{
    public function register(Request $request){

        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:userdatas',
            'state' => 'required|string',
            'user_name' => 'required|string',
            'password' => 'required|min:8'
        ]);

        $adddata = Userdata::create([
            'id' => $request->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'state' => $request->state,
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password)
        ]);

        $useraccess = Accesstype::where('id', $request->access_type)->first();

        $useraccess_type = new UserAccessType();
        $useraccess_type->userid = $adddata->id;
        $useraccess_type->useraccessid = $request->input('access_type');
        $useraccess_type->save();

        // Mail::to($request->email)->queue(new WelcomeEmail($adddata , $useraccess));
        // SendWelcomeEmail::dispatch($adddata , $useraccess);
        event(new UserRegistered($adddata,$useraccess));


        return view('login');
    }

    public function adduser(Request $request){
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:userdatas',
            'state' => 'required|string',
            'user_name' => 'required|string',
            'password' => 'required|min:8'
        ]);

        $adddata = Userdata::create([
            'id' => $request->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'state' => $request->state,
            'user_name' => $request->user_name,
            'password' => Hash::make($request->password)
        ]);

        $useraccess = Accesstype::where('id', $request->access_type)->first();

        $useraccess_type = new UserAccessType();
        $useraccess_type->userid = $adddata->id;
        $useraccess_type->useraccessid = $request->input('access_type');
        $useraccess_type->save();

        // Mail::to($request->email)->queue(new WelcomeEmail($adddata , $useraccess));
        // SendWelcomeEmail::dispatch($adddata , $useraccess);
        event(new UserRegistered($adddata,$useraccess));

        return redirect()->route('user.dashboard');
    }

    public function show()
    {
        $userdatas = Userdata::all();
        return view('users.show', compact('userdatas'));
    }

    public function display($id)
    {
        $data = Userdata::find($id);
        return view('users.display', compact('data'));
    }

    public function edit($id)
    {
        $data = Userdata::find($id);
        return view('users.edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'sometimes|required|email',
            'state' => 'required|string',
            'user_name' => 'required|string',
            'profileimage' => 'image|mimes:jpg,jpeg,png|max:1024'
        ]);

        $userdatas = Userdata::findOrFail($id);
        if ($request->hasFile('profileimage')){

            $imagename =  $request->first_name . "." . $request->file('profileimage')->guessExtension();
            $path = Storage::disk('public')->putFileAs('ProfileImages', $request->file('profileimage'),$imagename);

            if ($userdatas->image) {
                Storage::delete($userdatas->image->file_path);
                $userdatas->image->file_path = $path;
                $userdatas->image->save();
            } else {
                $userdatas->image()->save(
                    Image::create([
                        'file_path' => $path,
                        'userdata_id' => $id
                        ])
                );
            }
            $img = Image::where('userdata_id',$id)->first();
            session(['file_path' => $img->file_path]);
        }

        $userdatas->update($request->all());
        $userdatas->save();
        return redirect()->route('user.show');
    }

    public function delete($id)
    {
        $userdatas = Userdata::findOrFail($id);
        $userdatas->delete();
        return redirect()->route('user.show');
    }

    public function login(Request $request)
    {
        $val = Userdata::where('email', $request->email)
                ->first();

                $data = $request->validate([
                    'email' => 'required',
                    'password' => 'required'
                ]);

                if(Auth::attempt($data))
                {
                    session(['id' => $val->id]);
                    session(['first_name' => $val->first_name]);
                    session(['last_name' => $val->last_name]);
                    session(['email' => $val->email]);
                    session(['state' => $val->state]);
                    session(['user_name' => $val->user_name]);

                    $img = Image::where('userdata_id',$val->id)->first();
                    if($img){
                        session(['file_path' => $img->file_path]);
                    }

                    $userAccessType = UserAccessType::where('userid', session('id'))->first();
                    $accessType = Accesstype::where('id', $userAccessType->useraccessid)->value('access_type');
                    session(['access_type' => $accessType]);


                    return redirect()->route('user.dashboard');
                }
                else{

                return redirect()->route('user.login');
                }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return view('login');
    }


}
