<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartdetail extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
    public function connectCartHeader () {
        return $this->belongsTo(Cartheader::class, 'cartheader_id', 'id');
    }
    public function connectItem () {
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }
    use HasFactory;
}
