<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser as Contract;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as Parser;

class ParserService implements Contract
{

    protected string $url;

    public function setUrl(string $url): self
    {
        $this->url = $url;
        return  $this;
    }

    public function saveNews(): void
    {
        $xml = Parser::load($this->url);
        $parsedNews = $xml->parse([
            'title' => [
                'uses' => 'channel.title'
            ],
            'link' => [
                'uses' => 'channel.link'
            ],
            'description' => [
                'uses' => 'channel.description'
            ],
            'image' => [
                'uses' => 'channel.image.url'
            ],
            'news' => [
                'uses' => 'channel.item[title,link,guid,description,pubDate]'
            ]

        ]);

        $json = json_encode($parsedNews);
        $e = explode("/", $this->url);
        $fileName = end($e);

        Storage::append('news/' . $fileName, $json);
    }


}
