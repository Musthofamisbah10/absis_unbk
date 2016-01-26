<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class mPDFServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        $this->publishes([
            __DIR__.'/assets' => public_path('vendor/mpdf/mpdf/mpdf.php'),
        ], 'public');


    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
