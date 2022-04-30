<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialiteProvider extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'provider_name',
        'provider_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
