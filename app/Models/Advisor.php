<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advisor extends Model
{
    use HasFactory;

    protected $table = 'advisor';
    public $timestamps = false;

    protected $fillable = [
        'std_id',
        'tch_id',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'std_id');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'tch_id');
    }
}
