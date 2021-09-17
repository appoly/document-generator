<?php

namespace Appoly\DocumentGenerator;

use Appoly\DocumentGenerator\GenerateDocument;
use Illuminate\Support\ServiceProvider;

class DocumentGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Publishes configuration file.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Make config publishment optional by merging the config from the package.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('document-generator', function () {
            return new GenerateDocument();
        });
    }
}
