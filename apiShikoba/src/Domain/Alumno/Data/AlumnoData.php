<?php

namespace App\Domain\Alumno\Data;

use App\Domain\Parte\Data\ParteData;
use App\Domain\Cotutoria\Data\CotutoriaData;
use App\Domain\CotutoriaAlumno\Data\CotutoriaAlumnoData;
use Illuminate\Database\Eloquent\Model;

class AlumnoData extends Model
{ 
    /**
     * The table associated with the model.
     *
     * @var string
     */ 
    protected $table = 'alumno';

    /**
     * Get partes del profesor.
     */
    public function partes()
    {
        return $this->hasMany(ParteData::class);
    }

    /**
     * Get partes del profesor.
     */
    public function cotutorias()
    {
        return $this->hasOne(CotutoriaData::class);
    }

    /**
     * Get partes del profesor.
     */
    public function cotutoriasAlumno()
    {
        return $this->hasMany(CotutoriaAlumnoData::class);
    }
}