<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public $timestamps = false;
    public function connectCategory () {
        return $this->belongsTo(ProductCategory::class, 'category_id', 'id');
    }
    public function connectCartDetail () {
        return $this->hasOne(Cartdetail::class, 'item_id', 'id');
    }

    protected $fillable = ['name', 'category_id', 'detail', 'price', 'photourl', 'is_visible'];
    use HasFactory;
}
