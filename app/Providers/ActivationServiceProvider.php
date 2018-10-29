<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class ActivationServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
     
    public function boot()
    {
        //
    }
    
    /**
     * Register the application services.
     *
     * @return void
     */
     
    public function register()
    {
        $this->app->bind('App\Repositories\Activation\ActivationContract',
            'App\Repositories\Activation\EloquentActivationRepository');
    }
}
