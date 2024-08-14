<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['name', 'last_name', 'email'];

     // Relación muchos a muchos con Cursos
     public function courses()
     {
         return $this->belongsToMany(Course::class, 'course_student');
     }
 
     // Relación uno a muchos con Notas
     public function grades()
     {
         return $this->hasMany(Grade::class);
     }
}
