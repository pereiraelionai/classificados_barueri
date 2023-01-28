<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotivoCancelados extends Model
{
    use HasFactory;

    public function cancelado_produtos() {
        return $this->belongsTo('App\Models\AnuncioProduto', 'id', 'motivo_cancelados_id');
    }
}
