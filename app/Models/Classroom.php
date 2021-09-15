<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    protected $table = 'classrooms';
    protected $fillable = [
        'name',
        'grade_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function student()
    {
        return $this->hasMany(Student::class, 'classroom_id');
    }

    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'classroom_id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'classroom_id');
    }
}
