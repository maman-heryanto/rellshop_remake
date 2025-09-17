<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Machine extends Model
{
     use HasFactory;

    // Jika pakai mass assignment
    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi: 1 Machine punya banyak Equipment
    public function equipments()
    {
        return $this->hasMany(Equipment::class);
    }
}
