<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherInClass extends Model
{
    use HasFactory;

    protected $table = 'TeacherInClass';
    public $timestamps = FALSE;
}
