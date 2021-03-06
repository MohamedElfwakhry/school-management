<?php

namespace App\Models;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    protected $table = 'grades';
    protected $fillable = [
        'name_ar',
        'name_en',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;
    public function student()
    {
        return $this->hasMany(Student::class, 'grade_id');
    }
    public function classroom()
    {
        return $this->hasMany(Classroom::class, 'grade_id');
    }

    public function subject(){
        return $this->belongsToMany(Subject::class,'grade_subject','grade_id','subject_id');
    }

    public function exam(){
        return $this->belongsTo(Exam::class,'grade_id');
    }
}
