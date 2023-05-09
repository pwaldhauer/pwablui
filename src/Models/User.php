<?php

namespace PwaBlui\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laragear\WebAuthn\Contracts\WebAuthnAuthenticatable;
use Laragear\WebAuthn\WebAuthnAuthentication;
use Laravel\Sanctum\HasApiTokens;
use PwaBlui\Factories\UserFactory;

class User extends Authenticatable implements WebAuthnAuthenticatable
{
    use WebAuthnAuthentication;
    use HasApiTokens;
    use HasFactory, Notifiable;

    protected $fillable = [
        'username',
        'email',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
    ];

    protected static function newFactory()
    {
        return new UserFactory();
    }
}
