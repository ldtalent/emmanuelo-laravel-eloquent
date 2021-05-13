<?php

/**
 * Profile
 *
 * @author      Obua Emmanuel <eobua6882@gmail.com>
 * @copyright   2021 Obua Emmanuel
 * @link        http://emmanuelobua.me
 * @version     1.0.0
 *
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
	
    protected $guarded = ['id'];

    /**
     * A profile belongs a user
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
