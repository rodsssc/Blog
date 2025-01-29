<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $primaryKey = 'post_id';

    protected $fillable=[
        'user_id',
        'content',
        'image',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
