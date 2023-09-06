<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accesstype extends Model
{
    use HasFactory;
    protected $table = 'useraccess';

    public function user_data()
    {
        return $this->hasMany(Userdata::class);
    }
}
