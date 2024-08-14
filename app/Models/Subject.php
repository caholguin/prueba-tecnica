<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'name',
        'description',
    ];


    // Relación uno a muchos con Notas
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
