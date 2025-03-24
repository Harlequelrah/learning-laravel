<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperTag
 */
class Tag extends Model
{
    protected $fillable = ['name'];
    public function posts(){
    return $this->belongsToMany(Post::class);
    }

}
