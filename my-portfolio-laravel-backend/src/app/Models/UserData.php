<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'users_data';

    protected $casts = [
        'job_positions' => 'array',
        'projects' => 'array',
        'skills' => 'array',
        'faqs' => 'array'
    ];

    protected $fillable = [
        'user_id',
        'job_positions',
        'projects',
        'skills',
        'faqs',
        'created_by', 
        'updated_by'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}