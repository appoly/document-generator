<?php
namespace Appoly\DocumentGenerator;

use Exception;
use Illuminate\Support\Facades\Http;

class GenerateDocument
{

    private $mode;
    private $url;
    private $html;
    private $width;
    private $height;
    private $background;
    private $filename;
    private $watermark;

    public function __construct()
    {
        $this->mode = 'pdf';
        $this->background = true;
        $this->width = 1280;
        $this->height = 720;
        return $this;
    }

    /**
     * Set the mode to pdf
     *
     * @return GenerateDocument
     */
    public function pdf()
    {
        $this->mode = 'pdf';
        return $this;
    }

    /**
     * Set the mode to png
     *
     * @return GenerateDocument
     */
    public function png()
    {
        $this->mode = 'png';
        return $this;
    }

    /**
     * Set the url that will be rendered
     *
     * @param string $url
     * @return GenerateDocument
     */
    public function url(String $url)
    {
        $this->url = $url;
        return $this;
    }

    /**
     * Set the html that will be rendered
     *
     * @param string $data
     * @return GenerateDocument
     */
    public function html($data)
    {
        $this->html = $data;
        return $this;
    }

    /**
     * Set the width of the page
     *
     * @param int $w
     * @return GenerateDocument
     */
    public function width(Int $w)
    {
        $this->width = $w;
        return $this;
    }

    /**
     * Set the height of the page
     *
     * @param int $h
     * @return GenerateDocument
     */
    public function height(Int $h)
    {
        $this->height = $h;
        return $this;
    }

    /**
     * Set the filename, do not include the extension
     *
     * @param string $name
     * @return GenerateDocument
     */
    public function filename(String $name)
    {
        $this->filename = $name;
        return $this;
    }

    /**
     * Set the delay to wait for after page load
     *
     * @param int $delay
     * @return GenerateDocument
     */
    public function delay(int $delay)
    {
        $this->delay = $delay;
        return $this;
    }

    /**
     * when rendering a PDF, Set to `true` to print background graphics
     *
     * @param Bool $i
     * @return GenerateDocument
     */
    public function showBackground(Bool $i)
    {
        $this->background = $i;
        return $this;
    }

    /**
     * Set a watermark on the file, do not include the extension
     *
     * @param int $h
     * @return void
     */
    public function watermark(String $imageUrl = 'https://www.appoly.co.uk/app/themes/appoly/dist/images/logo.png')
    {
        $this->watermark = $imageUrl;
        return $this;
    }

    private function buildData()
    {
        $data = [
            $this->mode => true,
            'background' => $this->background,
            'width' => $this->width,
            'height' => $this->height
        ];

        if (isset($this->url)) {
            $data['url'] = $this->url;
        } else {
            $data['html'] = $this->html;
        }

        if (isset($this->filename)) {
            $data['filename'] = $this->filename;
        }

        if (isset($this->delay)) {
            $data['delay'] = $this->delay;
        }

        return $data;
    }
    
    /**
     * Get the base64 data.
     *
     * @return string
     */
    public function get()
    {

        if (env('DOCUMENT_GENERATOR_API_KEY') == null) {
            throw new Exception('Please set the api key in your .env under DOCUMENT_GENERATOR_API_KEY.');
        }

        $data = $this->buildData();

        if (!isset($data['url']) && !isset($data['html'])) {
            throw new Exception('A URL or HTML data must be set.');
        }

        $response = Http::withHeaders([
            'x-api-key' => env('DOCUMENT_GENERATOR_API_KEY')
        ])
            ->withBody(
                json_encode($data), 'application/json'
            )->post('https://j6un9iydxk.execute-api.eu-west-2.amazonaws.com/default/pdf-generation');

        return $response->body();
    }

}
