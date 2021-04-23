<?php

namespace App\Http\Controllers\Api;

use App\Http\Domain\Rate\RateDomain;

class RateController extends ApiController
{
    public function __construct(RateDomain $domain)
    {
        parent::__construct($domain);
    }
}
