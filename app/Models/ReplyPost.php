<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyPost extends Model
{
    use HasFactory;
    protected $fillable = [
        'reply_id',
        'post_id',
    ];
}
