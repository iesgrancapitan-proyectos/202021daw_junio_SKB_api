<?php

namespace App\Domain\Profesor\Data;

use App\Domain\Parte\Data\ParteData;
use App\Domain\Cotutoria\Data\CotutoriaData;
use App\Domain\CotutoriaAlumno\Data\CotutoriaAlumnoData;
use Illuminate\Database\Eloquent\Model;

class ProfesorData extends Model
{
    /**
    * The table associated with the model.
    *
    * @var string
    */ 
    protected $table = 'profesores';

    /**
    * Get partes del profesor.
    */
    public function partes()
    {
        return $this->hasMany(ParteData::class);
    }

    /**
    * Get cotutorias del profesor.
    */
    public function cotutorias()
    {
        return $this->hasMany(CotutoriaData::class);
    }

    /**
    * Get cotutorias del profesor.
    */
    public function cotutoriasAlumno()
    {
        return $this->hasMany(CotutoriaAlumnoData::class);
    }
}