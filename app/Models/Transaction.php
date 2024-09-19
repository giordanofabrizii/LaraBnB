<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sponsorship;
use App\Models\Apartment;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "braintree_id",
        "status",
        "amount"
    ];

    public function apartments()
    {
        return $this->belongsTo(Apartment::class, 'apartment_sponsorship_transaction')
                    ->withPivot('sponsorship_id')
                    ->withTimestamps();
    }

    public function sponsorships()
    {
        return $this->belongsTo(Sponsorship::class, 'apartment_sponsorship_transaction')
                    ->withPivot('apartment_id')
                    ->withTimestamps();
    }
}
