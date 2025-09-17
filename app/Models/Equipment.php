<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
     use HasFactory;

    protected $table = 'equipments'; // 👈 penting! pakai plural sesuai migration
    protected $fillable = [
        'machine_id',
        'name',
        'specification',
    ];

    // Relasi: Equipment milik Machine tertentu
    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
