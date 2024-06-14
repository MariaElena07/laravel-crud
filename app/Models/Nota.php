<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cursos_id',
        'nota1',
        'nota2',
        'nota3',
        'promedio',
        'created_at'
    ];

    // Relación con el modelo User (usuario/alumno)
    public function user()
    {
        return $this->belongsTo(User::class)->where('type', false); // Filtrar usuarios cuyo type sea false (alumnos)
    }

    // Relación con el modelo Materia
    public function cursos()
    {
        return $this->belongsTo(Cursos::class)->select('nombre_curso', 'id'); // Seleccionar solo el nombre de la materia
    }
}

