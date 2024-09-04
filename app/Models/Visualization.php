<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Visualization extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'date',
        'user_ip',
    ];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}
