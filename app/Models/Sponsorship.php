<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Sponsorship extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'period',
        'price',
    ];

    public function apartments(){
        return $this->belongsToMany(Apartment::class);
    }
}
