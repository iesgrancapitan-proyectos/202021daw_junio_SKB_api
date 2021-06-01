<?php

namespace App\Domain\Alumno\Data;

use App\Domain\Parte\Data\ParteData;
use App\Domain\Cotutoria\Data\CotutoriaData;
use App\Domain\CotutoriaAlumno\Data\CotutoriaAlumnoData;
use Illuminate\Database\Eloquent\Model;

class AlumnoData extends Model
{ 
    protected $table = 'alumno';

    public function partes()
    {
        return $this->hasMany(ParteData::class);
    }

    public function cotutorias()
    {
        return $this->hasOne(CotutoriaData::class);
    }

    public function cotutoriasAlumno()
    {
        return $this->hasMany(CotutoriaAlumnoData::class);
    }
}
