<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth:sanctum'])
    ->group(function () {
        Route::get('user', 'PwaBlui\Controllers\UserProfileController@index')->name('user.profile');

        Route::post('webauthn/register', 'PwaBlui\Controllers\WebAuthn\WebAuthnRegisterController@register')->name('webauthn.register');
        Route::post('webauthn/register/options', 'PwaBlui\Controllers\WebAuthn\WebAuthnRegisterController@options')->name('webauthn.register.options');
    });



Route::middleware(['web'])
    ->group(function () {

        Route::post('webauthn/login/options', 'PwaBlui\Controllers\WebAuthn\WebAuthnLoginController@options')->name('webauthn.login.options');
        Route::post('webauthn/login', 'PwaBlui\Controllers\WebAuthn\WebAuthnLoginController@login')->name('webauthn.login');
    });
