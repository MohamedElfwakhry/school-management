<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $fillable = [
        'name',
        'points',
        'time',
        'grade_id',
        'teacher_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function quize(){
        return $this->hasMany(Quize::class,'exam_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }
    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function student(){
        return $this->belongsToMany(Student::class,'student_exam','exam_id','student_id')
            ->withPivot('points');
    }

}
