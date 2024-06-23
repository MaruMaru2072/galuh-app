<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    public function connectItem () {
        return $this->belongsTo(Item::class);
    }
    use HasFactory;
}
