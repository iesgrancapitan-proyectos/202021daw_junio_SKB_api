<?php

namespace App\Domain\Profesor\Data;

use App\Domain\Parte\Data\ParteData;
use App\Domain\Cotutoria\Data\CotutoriaData;
use App\Domain\CotutoriaAlumno\Data\CotutoriaAlumnoData;
use Illuminate\Database\Eloquent\Model;

class ProfesorData extends Model
{
    protected $table = 'profesores';

    public function partes()
    {
        return $this->hasMany(ParteData::class);
    }

    public function cotutorias()
    {
        return $this->hasMany(CotutoriaData::class);
    }

    public function cotutoriasAlumno()
    {
        return $this->hasMany(CotutoriaAlumnoData::class);
    }
}
