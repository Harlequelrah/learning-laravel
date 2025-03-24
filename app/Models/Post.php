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

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
    return $this->belongsToMany(Tag::class);
    }
}
