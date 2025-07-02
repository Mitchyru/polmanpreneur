<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='user';
    protected $primaryKey = 'nim';
    protected $fillable = [
        'nim',
        'name',
        'email',
        'password',
        'notelp',
        'ttl',
        'profile',
        'setStatus',
        'setSeller',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public $timestamps = true;
    
    public function setPasswordAttribute($password){
    $this->attributes['password'] = bcrypt($password);
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function product()
    {
        return $this->hasMany(product::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
