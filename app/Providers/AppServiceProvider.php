<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        if(strpos(strtolower(php_sapi_name()), 'cli') !== false) {
            $path = 'logging.channels.stack.channels';
            $stacks = collect(config($path, []))
                ->push('stdout')
                ->unique();
            config([$path => $stacks]);
        }
    }
}
