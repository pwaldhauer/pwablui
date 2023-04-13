<?php

namespace PwaBlui;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use PwaBlui\Livewire\Profile\EditUserData;
use PwaBlui\Livewire\Profile\ManageApiKeys;
use PwaBlui\Livewire\Profile\ManagePasskeys;

final class PwaBluiServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'pwablui');

        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->commands([
            Console\Commands\InitCommand::class,
            Console\Commands\UserCreateCommand::class,
        ]);

        Blade::anonymousComponentPath(__DIR__.'/../resources/views/components', 'pwablui');
        Blade::componentNamespace('PwaBlui\\Views\\Components', 'pwablui');

        Livewire::component('profile.manage-passkeys', ManagePasskeys::class);
        Livewire::component('profile.manage-apikeys', ManageApiKeys::class);
        Livewire::component('profile.edit-user-data', EditUserData::class);
    }
}
