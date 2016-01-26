<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CKEditorServiceProvider extends ServiceProvider
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
            __DIR__.'/assets' => public_path('vendor/ckeditor/ckeditor/ckeditor.js'),
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
