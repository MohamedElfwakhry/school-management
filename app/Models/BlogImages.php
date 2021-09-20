<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImages extends Model
{
    protected $table = 'blog_images';
    protected $fillable = [
        'image',
        'blog_id',
    ];
    public $timestamps = true;
    public function getImageAttribute($image)
    {
        if (!empty($image)) {
            return asset('uploads/Blog') . '/' . $image;
        }
        return asset('uploads/image.jpg');

    }

    /*public function setImageAttribute($image)
    {
        if (is_file($image)) {
            $imageFields = upload($image, 'Blog');
            $this->attributes['image'] = $imageFields;
        }
    }*/

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
