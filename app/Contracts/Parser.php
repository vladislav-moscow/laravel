<?php
declare(strict_types=1);

namespace App\Contracts;

interface Parser
{
    /**
     * @param string $url
     * @return $this
     */
    public function setUrl(string $url): self;

    /**
     * @return void
     */
    public function saveNews(): void;
}
