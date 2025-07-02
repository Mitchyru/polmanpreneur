<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Letter as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Letter extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'letter_id';
    protected $fillable = [
        'user_id',
        'nim',
        'name',
        'email',
        'file',
    ];
}
