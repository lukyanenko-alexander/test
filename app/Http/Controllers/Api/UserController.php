<?php

namespace App\Http\Controllers\Api;

use App\Http\Domain\User\UserDomain;

class UserController extends ApiController
{
    public function __construct(UserDomain $domain)
    {
        parent::__construct($domain);
    }
}
