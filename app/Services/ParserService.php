<?php
declare(strict_types=1);

namespace App\Services;

use App\Contracts\Parser as Contract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as Parser;

class ParserService implements Contract
{

    public string $url;

    public function setUrl(): self
    {
        $this->url = $url;
        return  $this;
    }

    public function saveNews(string $url)
    {
        $xml = Parser::load($url);
        $data = $xml->parse([
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

        $newsList = $data['news'];

        $category_id = DB::table('categories')->insertGetId([
            'title' => $data['title'],
            'description' => $data['description'],
        ]);

        foreach ($newsList as $news) {
            $sources_id = DB::table('sources')->insertGetId([
                'name' => $data['title'],
                'UrlSource' => $news['link'],
            ]);

            DB::table('news')->insert([
                'title' => $news['title'],
                'category_id' => $category_id,
                'description' => $news['description'],
                'source_id' => $sources_id,
                'image' => $data['image']
            ]);
        }
    }

}
