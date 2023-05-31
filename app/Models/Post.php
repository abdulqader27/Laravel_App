<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpKernel\Exception\UnexpectedSessionUsageException;

class Post extends Model
{
    use HasFactory;
    public $guarded=[];


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }

}
