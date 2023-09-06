<?php

use App\Http\Controllers\AssignChapterController;
use App\Http\Controllers\AssignSubjectController;
use App\Http\Controllers\AssignStudentController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\StandardController;
use App\Http\Controllers\SubjectController;
use App\Models\Accesstype;
use Illuminate\Support\Facades\Route;

Route::get('/' , function() { return view('login'); });
Route::post('/', [DataController::class, 'login'])->name('user.login');
Route::get('/', [DataController::class, 'logout'])->name('user.logout');

Route::get('/dashboard',function() {return view('users.dashboard'); })->name('user.dashboard')->middleware('auth');
Route::get('/register', function () {$accessType = Accesstype::all(); return view('register',['access_type' => $accessType]);})->name('user.register');


Route::post('/user', [DataController::class, 'register'])->name('user.store');
Route::post('/user/adduser', [DataController::class, 'adduser'])->name('user.add');
Route::get('/user/show', [DataController::class, 'show'])->name('user.show')->middleware('auth');
Route::put('/user/edit/{id}', [DataController::class, 'update'])->name('user.update')->middleware('auth');
Route::get('/user/edit/{id}', [DataController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::get('/user/display/{id}', [DataController::class, 'display'])->name('user.display')->middleware('auth');
Route::delete('/user/delete/{id}', [DataController::class, 'delete'])->name('user.delete')->middleware('auth');
Route::get('/adduser', function () {$accessType = Accesstype::all(); return view('users.add',['access_type' => $accessType]);})->name('user.adduser')->middleware('auth');


Route::post('/chapter/store', [ChapterController::class, 'store'])->name('chapter.store')->middleware('auth');
Route::get('/chapter/show', [ChapterController::class, 'show'])->name('chapter.show')->middleware('auth');
Route::put('/chapter/status/{id}', [ChapterController::class, 'updatestatus'])->name('chapter.updatestatus')->middleware('auth');
Route::put('/chapter/edit/{id}', [ChapterController::class, 'update'])->name('chapter.update')->middleware('auth');
Route::get('/chapter/edit/{id}', [ChapterController::class, 'edit'])->name('chapter.edit')->middleware('auth');
Route::get('/chapter/display/{id}', [ChapterController::class, 'display'])->name('chapter.display')->middleware('auth');
Route::delete('/chapter/delete/{id}', [ChapterController::class, 'delete'])->name('chapter.delete')->middleware('auth');


Route::post('/subject/store', [SubjectController::class, 'store'])->name('subject.store')->middleware('auth');
Route::get('/subject/show', [SubjectController::class, 'show'])->name('subject.show')->middleware('auth');
Route::put('/subject/edit/{id}', [SubjectController::class, 'update'])->name('subject.update')->middleware('auth');
Route::get('/subject/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit')->middleware('auth');
Route::get('/subject/display/{id}', [SubjectController::class, 'display'])->name('subject.display')->middleware('auth');
Route::delete('/subject/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete')->middleware('auth');


Route::post('/standard/store', [StandardController::class, 'store'])->name('standard.store')->middleware('auth');
Route::get('/standard/show', [StandardController::class, 'show'])->name('standard.show')->middleware('auth');
Route::put('/standard/edit/{id}', [StandardController::class, 'update'])->name('standard.update')->middleware('auth');
Route::get('/standard/edit/{id}', [StandardController::class, 'edit'])->name('standard.edit')->middleware('auth');
Route::get('/standard/display/{id}', [StandardController::class, 'display'])->name('standard.display')->middleware('auth');
Route::delete('/standard/delete/{id}', [StandardController::class, 'delete'])->name('standard.delete')->middleware('auth');


Route::get('/assign_chapter', [AssignChapterController::class, 'index'])->name('assign_chapter.show')->middleware('auth');
Route::post('/assign_chapter', [AssignChapterController::class, 'assign'])->name('assign_chapter.store')->middleware('auth');


Route::get('/assign_subject', [AssignSubjectController::class, 'index'])->name('assign_subject.show')->middleware('auth');
Route::post('/assign_subject', [AssignSubjectController::class, 'assign'])->name('assign_subject.store')->middleware('auth');


Route::get('/assign_student', [AssignStudentController::class, 'index'])->name('assign_student.show')->middleware('auth');
Route::post('/assign_student', [AssignStudentController::class, 'assign'])->name('assign_student.store')->middleware('auth');
