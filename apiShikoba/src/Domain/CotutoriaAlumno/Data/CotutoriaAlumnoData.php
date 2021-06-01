<?php

namespace App\Domain\CotutoriaAlumno\Data;

use App\Domain\Profesor\Data\ProfesorData;
use App\Domain\Alumno\Data\AlumnoData;
use App\Domain\Materia\Data\MateriaData;
use App\Domain\Actitud\Data\ActitudData;
use App\Domain\Comportamiento\Data\ComportamientoData;
use Illuminate\Database\Eloquent\Model;

class CotutoriaAlumnoData extends Model
{
    protected $table = 'alumno_cotutoria';

    public function profesor()
    {              
        return $this->belongsTo(ProfesorData::class, 'idProfesor');
    }

    public function alumno()
    {              
        return $this->belongsTo(AlumnoData::class, 'idAlumno');
    }

    public function materia()
    {              
        return $this->belongsTo(MateriaData::class, 'idMateria');
    }

    public function actitud()
    {              
        return $this->belongsTo(ActitudData::class, 'idActitud');
    }

    public function comportamiento()
    {              
        return $this->belongsTo(ComportamientoData::class, 'idComportamiento');
    }
}
