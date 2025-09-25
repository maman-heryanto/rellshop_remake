<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $table = 'sessions';
    public $timestamps = false; 
    protected $primaryKey = 'id';
    public $incrementing = false; 
    protected $keyType = 'string'; 

   protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'user_agent',
        'payload',
        'last_activity',
    ];


    // Relasi ke User (optional, kalau ada auth)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
