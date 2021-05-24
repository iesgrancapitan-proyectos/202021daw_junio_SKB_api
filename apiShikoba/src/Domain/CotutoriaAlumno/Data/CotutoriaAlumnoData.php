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
    /**
    * The table associated with the model.
    *
    * @var string
    */ 
    protected $table = 'alumno_cotutoria';

    /**
     * Profesor que hace el registro
     */
    public function profesor()
    {              
        return $this->belongsTo(ProfesorData::class, 'idProfesor');
    }

    /**
     * Alumno
     */
    public function alumno()
    {              
        return $this->belongsTo(AlumnoData::class, 'idAlumno');
    }

    /**
     * Materia
     */
    public function materia()
    {              
        return $this->belongsTo(MateriaData::class, 'idMateria');
    }

    /**
     * Actitud
     */
    public function actitud()
    {              
        return $this->belongsTo(ActitudData::class, 'idActitud');
    }

    /**
     * Comportamiento
     */
    public function comportamiento()
    {              
        return $this->belongsTo(ComportamientoData::class, 'idComportamiento');
    }
}