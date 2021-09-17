<?php

namespace Appoly\DocumentGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static void pdf() Set the mode to pdf
 * @method static void png() Set the mode to png
 * @method static void url(String $url) Set the url that will be rendered
 * @method static void html($html) Set the html that will be rendered
 * @method static void width(Int $w) Set the width of the page
 * @method static void height(Int $w) Set the height of the page
 * @method static void filename(String $name) Set the filename, do not include the extension
 * @method static void showBackground(Bool $i) When rendering a PDF, Set to `true` to print background graphics
 *
 */

class DocumentGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'document-generator';
    }
}
