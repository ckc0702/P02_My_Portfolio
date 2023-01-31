<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPersonalData extends Model
{
    protected $table = 'users_personal_data';

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}