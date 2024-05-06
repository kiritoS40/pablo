<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function home(): HasOne
    {
        return $this->hasOne(Home::class);
    }

    public function about(): HasOne
    {
        return $this->hasOne(About::class);
    }


    public function services(): HasOne
    {
        return $this->hasOne(Services::class);
    }

    public function portfolio(): HasOne
    {
        return $this->hasOne(Portfolio::class);
    }

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class);
    }

    public function settings(): HasOne
    {
        return $this->hasOne(Settings::class);
    }
}
