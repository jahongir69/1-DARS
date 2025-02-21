<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{


    use HasFactory;

    protected $fillable = ['name', 'email', 'password'];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    
    
    
    }
