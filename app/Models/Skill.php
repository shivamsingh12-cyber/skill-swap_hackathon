<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    public $timestamps = false; 
    public $guarded = []; // Allow mass assignment for all attributes

    public function usersOffering()
{
    return $this->belongsToMany(User::class, 'skill_user_offered');
}

public function usersWanting()
{
    return $this->belongsToMany(User::class, 'skill_user_wanted');
}

}
