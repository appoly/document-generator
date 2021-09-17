<?php

namespace Appoly\DocumentGenerator\Facades;

use Illuminate\Support\Facades\Facade;

class DocumentGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'document-generator';
    }
}
