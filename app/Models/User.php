<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
 
use Illuminate\Database\Eloquent\Casts\Attribute;
 
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];
 
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin"][$value],
        );
    }

    // Relación con el modelo Nota
    public function notas()
    {
        return $this->hasMany(Nota::class);
    }

     // Relación con el modelo Curso
     public function cursos()
     {
        return $this->belongsToMany(cursos::class);
     }
     public function inscripciones()
     {
         return $this->belongsToMany(cursos::class, 'inscripciones', 'user_id', 'curso_id');
     }
   
}
