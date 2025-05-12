<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{   
    use HasFactory;
    protected $fillable = ['merk_id', 'model', 'color', 'year', 'price', 'image'];

    public function merk()
    {
        return $this->belongsTo(Merk::class);
    }
}
