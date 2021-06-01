<?php

namespace App\Domain\Cotutoria\Data;

use App\Domain\Profesor\Data\ProfesorData;
use App\Domain\Alumno\Data\AlumnoData;
use Illuminate\Database\Eloquent\Model;

class CotutoriaData extends Model
{
    protected $table = 'cotutorias';

    public function profesor()
    {              
        return $this->belongsTo(ProfesorData::class, 'idProfesor');
    }

    public function alumno()
    {              
        return $this->belongsTo(AlumnoData::class, 'idAlumno');
    }
}
