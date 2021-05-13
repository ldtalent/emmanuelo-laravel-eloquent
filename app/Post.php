<?php

/**
 * Post
 *
 * @author      Obua Emmanuel <eobua6882@gmail.com>
 * @copyright   2021 Obua Emmanuel
 * @link        http://emmanuelobua.me
 * @version     1.0.0
 *
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
