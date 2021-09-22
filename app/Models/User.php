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
        'username',
        'password',
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
    public function suratsktm()
    {
        return $this->hasMany(SuratSktm::class);
    }
    public function suratskd()
    {
        return $this->hasMany(SuratSkd::class);
    }
    public function suratskpp()
    {
        return $this->hasMany(SuratSkp::class);
    }
    public function latestsktm()
    {
        return $this->hasOne(SuratSktm::class)->latest();
    }
    public function latestskd()
    {
        return $this->hasOne(SuratSkd::class)->latest();
    }
    public function latestskpp()
    {
        return $this->hasOne(SuratSkp::class)->latest();
    }
}
