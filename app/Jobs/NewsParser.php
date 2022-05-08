<?php

namespace App\Jobs;

use App\Contracts\Parser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class NewsParser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @param string $link
     */
    public function __construct(string $link)
    {

    }

    /**
     * @param Parser $parser
     * @return void
     */
    public function handle(Parser $parser): void
    {
        $parser->setUrl($this->link)->saveNews();
    }
}
