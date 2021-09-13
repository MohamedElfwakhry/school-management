<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'grades';
    protected $fillable = [
        'address',
        'name_en',
        'notes',
        'file',
        'photo',
        'classroom_id',
        'created_at',
        'updated_at'
    ];
    public $timestamps = true;

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id');
    }
}
