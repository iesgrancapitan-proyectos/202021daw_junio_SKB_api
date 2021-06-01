<?php

namespace App\Domain\Parte\Data;

use App\Domain\Profesor\Data\ProfesorData;
use App\Domain\Alumno\Data\AlumnoData;
use Illuminate\Database\Eloquent\Model;

class ParteData extends Model
{
    protected $table = 'partes';

    public function profesor()
    {              
        return $this->belongsTo(ProfesorData::class, 'idProfesor');
    }

    public function alumno()
    {
        return $this->belongsTo(AlumnoData::class,'idAlumno');
    }
}
