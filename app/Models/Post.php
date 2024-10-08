<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function autobots()
    {
        return $this->belongsTo(Autobot::class);
    }
}
