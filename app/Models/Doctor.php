<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'specialization',
        'clinic_id',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
