<?php

namespace App\Services\Test;

class Test2Service implements TestServiceInterface
{
    public function __construct(public string $a, public string $b, public string $c, public string $d) {}

    public function getTest(): string
    {
        return $this->a . $this->b . $this->c . $this->d;
    }
}
