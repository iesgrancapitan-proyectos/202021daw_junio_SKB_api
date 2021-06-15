<?php

namespace App\Domain\Sancion\Data;

use App\Domain\Alumno\Data\AlumnoData;
use App\Domain\ParteSancion\Data\ParteSancionData;
use Illuminate\Database\Eloquent\Model;

class SancionData extends Model
{
    protected $table = 'sanciones';

    public function alumno()
    {
        return $this->belongsTo(AlumnoData::class, 'idAlumno');
    }

    public function parteSancion()
    {
        return $this->hasMany(ParteSancionData::class, 'partes_id');
    }
}
