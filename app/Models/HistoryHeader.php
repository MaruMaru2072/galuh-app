<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class historyheader extends Model
{
    public $timestamps = false;
    public function connectUser () {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function connectHistoryDetail () {
        return $this->hasMany(HistoryDetail::class);
    }
    use HasFactory;
}
