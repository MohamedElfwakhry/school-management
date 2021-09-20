<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class ParentStudent extends Authenticatable
{
    use HasFactory;
    protected $table = 'parents';
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
            return asset('uploads/Parent') . '/' . $image;
        }
        return asset('uploads/image.jpg');

    }

    public function setPhotoAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Parent');
            $this->attributes['photo'] = $imageFields;
        }
    }
    public function student()
    {
        return $this->hasMany(Student::class, 'parent_id');
    }
}
