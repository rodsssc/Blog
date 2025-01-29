<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   

    protected $fillable=[
        'user_id',
        'content',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function comments()
{
    return $this->hasMany(Comment::class, 'post_id'); // Make sure this is correct
}

}
