<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $fillable = [
        'student_id',
        'subject_id',
        'note',
        'date',
        'observation',
    ];

    // Relación inversa con Estudiante
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    // Relación inversa con Estudiante
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

}
