<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable
{
    use HasFactory;
    protected $table = 'teachers';
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function getPhotoAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Teacher') . '/' . $image;
        }
        return asset('uploads/image.jpg');

    }

    public function setPhotoAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Teacher');
            $this->attributes['photo'] = $imageFields;
        }
    }
    public function classroom(){
        return $this->belongsToMany(Classroom::class,'teacher_classroom','teacher_id','classroom_id');
    }

}
