<?php

namespace App\Services\Test;

interface TestServiceInterface
{
    public function __construct(string $a, string $b, string $c, string $d);

    public function getTest() : string;
}
