<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $guarded = ['id'];
    public $timestamps = false;
    public function connectCartHeader () {
        return $this->belongsTo(CartHeader::class, 'cartheader_id', 'id');
    }
    public function connectItem () {
        return $this->belongsTo(item::class, 'item_id', 'id');
    }
    use HasFactory;
}
