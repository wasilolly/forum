<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Channel;
use Facade\FlareClient\View;

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
        view()->share('channels', Channel::all());
    }
}
