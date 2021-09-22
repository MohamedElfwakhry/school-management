<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = [
        'name',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function grade(){
        return $this->belongsToMany(Grade::class,'grade_subject','subject_id','grade_id');
    }
}
