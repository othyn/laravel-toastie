<?php

declare(strict_types=1);

namespace Othyn\Toastie\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Othyn\Toastie\Helpers\Path;
use Othyn\Toastie\Services\Toastie;

class ToastieServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Merge the config into the application config so it can be used
        $this->mergeConfigFrom(Path::inResoures('/config/toastie.php'), 'toastie');

        // Register the service the package provides.
        $this->app->singleton('toastie', Toastie::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Load in custom view components, not sure if I'm doing something wrong
        // But just loading the component errors as the view cannot be found when calling view() in the render() method
        //  of the component class. Bit of an oversight on Laravel's part... its also not documented either!
        $this->loadViewsFrom(Path::inResoures('/views'), 'toastie');
        Blade::componentNamespace('Othyn\\Toastie\\Views\\Components', 'toastie');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes(
            [
                Path::inResoures('/config/toastie.php') => config_path('toastie.php'),
            ],
            'toastie-config'
        );

        // Publishing the views.
        $this->publishes(
            [
                Path::inResoures('/views') => resource_path('views/vendor/toastie'),
            ],
            'toastie-views'
        );
    }
}
