<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historydetail extends Model
{
    public $timestamps = false;
    public function connectHistoryHeader () {
        return $this->belongsTo(Historyheader::class, 'historyheader_id', 'id');
    }
    public function connectItem () {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    use HasFactory;
}
