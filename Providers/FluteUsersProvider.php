<?php

namespace Flute\Modules\FluteUsers\Providers;

use Flute\Core\Support\ModuleServiceProvider;

class FluteUsersProvider extends ModuleServiceProvider
{
    public array $extensions = [];

    public function boot(\DI\Container $container): void
    {
        $this->bootstrapModule();
        
        $this->loadViews('Resources/views', 'fluteusers');

        $this->loadScss('Resources/assets/sass/main.scss');
    }

    public function register(\DI\Container $container): void
    {
    }
}