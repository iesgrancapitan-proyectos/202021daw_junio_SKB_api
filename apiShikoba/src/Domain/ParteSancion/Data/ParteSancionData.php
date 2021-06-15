<?php

namespace App\Domain\ParteSancion\Data;

use App\Domain\Parte\Data\ParteData;
use App\Domain\Sancion\Data\SancionData;
use Illuminate\Database\Eloquent\Model;

class ParteSancionData extends Model
{
    protected $table = 'sanciones_partes';
    protected $primaryKey = 'partes_id';

    public function parte()
    {
        return $this->belongsTo(ParteData::class, 'partes_id');
    }

    public function sancion()
    {              
        return $this->belongsTo(SancionData::class, 'sanciones_id');
    }
}
