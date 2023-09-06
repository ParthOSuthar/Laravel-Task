<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAccessType extends Model
{
    use HasFactory;
    protected $table = 'useraccesstypes';
    protected $fillable = ['userid','useraccessid'];
}
