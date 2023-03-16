<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id ',
        'title',
        'content',
    ];

    public function replies() {
        return $this->belongsToMany(Reply::class, 'reply_posts');
      }
}
