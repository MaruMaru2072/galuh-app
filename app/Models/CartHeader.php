<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHeader extends Model
{
    public $timestamps = false;
    public function connectUser () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function connectCartDetail () {
        return $this->hasMany(CartDetail::class, 'cartheader_id', 'id');
    }

    use HasFactory;
}
