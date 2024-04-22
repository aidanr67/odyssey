<?php

namespace App\External;

interface AuthenticatedCurlClientInterface
{
    public function query(string $query): string;
}
