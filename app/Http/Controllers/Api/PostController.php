<?php

namespace App\Http\Controllers\Api;

use App\Http\Domain\Post\PostDomain;
use Illuminate\Http\JsonResponse;

class PostController extends ApiController
{
    public function __construct(PostDomain $domain)
    {
        parent::__construct($domain);
    }
}
