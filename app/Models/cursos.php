<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cursos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre_curso', 
        'precio_curso',
        'dateCurso'
    ];

    // Relación con el modelo Nota
    public function notas()
    {
        return $this->hasMany(Nota::class);
    }
    // Relación con el modelo User
    public function alumnos()
    {
        return $this->hasMany(User::class);
    }
    
    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class);
    }

}
