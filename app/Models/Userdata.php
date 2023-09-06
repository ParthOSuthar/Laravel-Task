<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Userdata extends Authenticatable
{
    use HasFactory;

    protected $table = 'userdatas';
    protected $fillable = ['first_name','last_name','email','state','user_name','password'];

    public function access_type()
    {
        return $this->belongsTo(Accesstype::class);
    }

    public function useraccess_type()
    {
        return $this->hasOne(UserAccessType::class);
    }

    public function image(){
        return $this->hasOne(Image::class);
    }
}
