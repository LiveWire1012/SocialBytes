<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Users extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'social_users';
    protected $guarded = [];

    const STATUS_ACTIVE = 1;

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts() {
        return $this->hasMany(Post::class, 'user_id');
    }
}
