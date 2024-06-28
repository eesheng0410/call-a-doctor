<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Clinic extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'pin',
        'area',
    ];

    protected $hidden = [
        'pin',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
