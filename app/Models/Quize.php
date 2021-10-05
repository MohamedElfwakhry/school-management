<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quize extends Model
{
    use HasFactory;
    protected $table = 'quizes';
    protected $fillable = [
        'question',
        'answer1',
        'answer2',
        'answer3',
        'answer4',
        'right_answer',
        'points',
        'exam_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function quize(){
        return $this->hasMany(Exam::class,'exam_id');
    }
}
