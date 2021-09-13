<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'classroom_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
