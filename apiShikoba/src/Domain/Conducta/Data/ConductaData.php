<?php

namespace App\Domain\Conducta\Data;

use Illuminate\Database\Eloquent\Model;
use App\Domain\ParteConducta\Data\ParteConductaData;

class ConductaData extends Model
{
    protected $table = 'conductas';

    public function parteConducta()
    {
        return $this->hasMany(ParteConductaData::class, 'conductas_id');
    }
}