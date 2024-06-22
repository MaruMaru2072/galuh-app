<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cartheader extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['user_id'];
    public function connectUser () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function connectCartDetail () {
        return $this->hasMany(Cartdetail::class, 'cartheader_id', 'id');
    }
}
