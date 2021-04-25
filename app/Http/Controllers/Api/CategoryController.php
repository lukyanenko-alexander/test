<?php

namespace App\Http\Controllers\Api;

use App\Http\Domain\Category\CategoryDomain;

class CategoryController extends ApiController
{
    /**
     * CategoryController constructor.
     * @param CategoryDomain $domain
     */
    public function __construct(CategoryDomain $domain)
    {
        parent::__construct($domain);
    }
}
