<?php
declare(strict_types=1);

namespace App\Contracts;

interface Parser
{
    public function setUrl(string $url): self;
    public function saveNews(): void;}
