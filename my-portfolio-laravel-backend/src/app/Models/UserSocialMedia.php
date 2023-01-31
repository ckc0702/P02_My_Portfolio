<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserSocialMedia extends Model
{
    protected $table = 'users_socials_media';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}