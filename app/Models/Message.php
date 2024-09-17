<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Apartment;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'apartment_id',
        'sender_email',
        'sender_name',
        'text',
        'date',
        'seen_date',
    ];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}
