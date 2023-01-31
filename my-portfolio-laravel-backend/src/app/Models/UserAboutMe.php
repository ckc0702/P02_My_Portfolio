<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAboutMe extends Model
{
    protected $table = 'users_about_me';

    protected $fillable = [
        'user_id', 
        'age', 
        'self_introduction', 
        'about_experience', 
        'about_qualification', 
        'about_projects', 
        'about_text_1', 
        'about_text_2', 
        'created_by', 
        'updated_by'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}