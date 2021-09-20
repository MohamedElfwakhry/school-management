<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Authenticatable
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

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function parent()
    {
        return $this->belongsTo(ParentStudent::class, 'parent_id');
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
