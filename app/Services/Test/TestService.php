<?php

namespace App\Services\Test;

class TestService implements TestServiceInterface
{
    public function __construct(public string $a, public string $b) {}

    public function getTest(): string
    {
        return $this->a . $this->b;
    }
}
