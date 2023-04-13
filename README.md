
# Setup 

```

    'providers' => [
        'users' => [
            'driver' => 'eloquent-webauthn',
            'model' => App\User::class,
            'password_fallback' => true,
        ],
    ]

 php artisan vendor:publish --provider="Laragear\WebAuthn\WebAuthnServiceProvider" --tag="migrations"
 php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
 php artisan livewire:publish --assets
 php artisan vendor:publish --tag=livewire:config
 

```