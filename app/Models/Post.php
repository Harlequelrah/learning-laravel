<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPost
 */
class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug'
    ];
    protected $guarded = [];
}
