<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ParentStudent extends Authenticatable
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'grade_id',
        'parent_id',
        'classroom_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    public function student()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
}
