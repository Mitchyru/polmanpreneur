<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\product as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class product extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'user_id',
        'nim',
        'name',
        'price',
        'category',
        'desc',
        'setStatus',
        'image',
    ];

    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
