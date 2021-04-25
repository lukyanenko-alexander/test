<?php

namespace App\Http\Controllers\Api;

use App\Http\Domain\Comment\CommentDomain;

class CommentController extends ApiController
{
    /**
     * CommentController constructor.
     * @param CommentDomain $domain
     */
    public function __construct(CommentDomain $domain)
    {
        parent::__construct($domain);
    }
}
