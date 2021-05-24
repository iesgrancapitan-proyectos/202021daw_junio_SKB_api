<?php

namespace App\Domain\Cotutoria\Data;

use App\Domain\Profesor\Data\ProfesorData;
use App\Domain\Alumno\Data\AlumnoData;
use Illuminate\Database\Eloquent\Model;

class CotutoriaData extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */ 
    protected $table = 'cotutorias';

    /**
     * Get profesor cotutor.
     */
    public function profesor()
    {              
        return $this->belongsTo(ProfesorData::class, 'idProfesor');
    }

    /**
     * Get alumno cotutelado.
     */
    public function alumno()
    {              
        return $this->belongsTo(AlumnoData::class, 'idAlumno');
    }
}