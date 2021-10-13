<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'country_id',
        'aspiration_id',
        'therapy_id',
        'ip'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**************** Relations ************/

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function aspiration()
    {
        return $this->belongsTo(Aspiration::class);
    }

    public function therapy()
    {
        return $this->belongsTo(Therapy::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
