<?php

namespace Appoly\DocumentGenerator\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Appoly\DocumentGenerator\GenerateDocument pdf() Set the mode to pdf
 * @method static Appoly\DocumentGenerator\GenerateDocument png() Set the mode to png
 * @method static Appoly\DocumentGenerator\GenerateDocument url(String $url) Set the url that will be rendered
 * @method static Appoly\DocumentGenerator\GenerateDocument html($html) Set the html that will be rendered
 * @method static Appoly\DocumentGenerator\GenerateDocument width(Int $w) Set the width of the page
 * @method static Appoly\DocumentGenerator\GenerateDocument height(Int $w) Set the height of the page
 * @method static Appoly\DocumentGenerator\GenerateDocument filename(String $name) Set the filename, do not include the extension
 * @method static Appoly\DocumentGenerator\GenerateDocument showBackground(Bool $i) When rendering a PDF, Set to `true` to print background graphics
 * @method static Appoly\DocumentGenerator\GenerateDocument delay(int $delay) When rendering a PDF, wait X seconds for browser
 * @method static Appoly\DocumentGenerator\GenerateDocument header(string $header) Add header html
 * @method static Appoly\DocumentGenerator\GenerateDocument footer(string $footer) Add footer html
 * @method static Appoly\DocumentGenerator\GenerateDocument margin(array $margins) Add margins
 *
 */

class DocumentGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'document-generator';
    }
}
