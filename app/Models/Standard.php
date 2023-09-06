<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Standard extends Model
{
    use HasFactory;
    protected $table = 'standards';
    protected $fillable = ['standard'];

    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'assignsubjecttostandard');
    }
    public function students()
    {
        return $this->belongsToMany(Userdata::class, 'assignstudenttostandard');
    }

}
