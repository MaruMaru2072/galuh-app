<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id', 'account_email', 'price', 'is_bought'
    ];

    public function connectAccount () {
        return $this->belongsTo(Account::class, 'account_email');
    }
    public function connectItem () {
        return $this->hasMany(Item::class, 'item_id');
    }

}
