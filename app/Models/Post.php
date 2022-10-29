<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_slug',
        'post_title',
        'post_summary',
        'post_category',
        'post_sub_category',
        'post_image',
        'post_body',
        'post_tags',
        'post_status',
        'post_section',
    ];

}
