<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = [];

    protected $appends = ['date'];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'comment_id')
        ->with('comments');
    }
    
    public function getDateAttribute()
    {
        return $this->created_at->format('Y-m-d g:i a');
    }
}
