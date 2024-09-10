<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Visualization;
use App\Models\Message;
use App\Models\Sponsorship;
use App\Models\Service;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'name',
        'description',
        'surface',
        'image',
        'n_room',
        'n_bed',
        'n_bath',
        'address',
        'latitude',
        'longitude',
        'price',
        'visible',
    ];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function visualizations()
    {
        return $this->hasMany(Visualization::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function sponsorships()
    {
        return $this->belongsToMany(Sponsorship::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class);
    }
}
