<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'address',
        'notes',
        'classroom_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
    public function blogImages()
    {
        return $this->hasMany(BlogImages::class, 'blog_id');
    }
}
