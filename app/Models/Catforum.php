<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catforum extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function forums()
    {
        return $this->hasMany(Forum::class);
    }
}
