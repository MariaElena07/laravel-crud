<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
    use HasFactory;
 
    // Define los campos que se pueden asignar masivamente
    protected $fillable = [        
        'id',
        'user_id',
        'curso_id'
        // Agrega aquí cualquier otro campo que necesites
    ];

    // Define las relaciones con los modelos User y Curso
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function curso()
    {
        return $this->belongsTo(cursos::class);
        
    }
}
