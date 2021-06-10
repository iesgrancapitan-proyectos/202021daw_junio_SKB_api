<?php

namespace App\Domain\ParteConducta\Data;

use App\Domain\Parte\Data\ParteData;
use App\Domain\Conducta\Data\ConductaData;
use Illuminate\Database\Eloquent\Model;

class ParteConductaData extends Model
{
    protected $table = 'partes_conductas';
    protected $primaryKey = 'partes_id';

    public function parte()
    {              
        return $this->belongsTo(ParteData::class, 'partes_id');
    }

    public function conducta()
    {              
        return $this->belongsTo(ConductaData::class, 'conductas_id');
    }
}
