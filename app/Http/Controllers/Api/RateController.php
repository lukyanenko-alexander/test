<?php

namespace App\Http\Controllers\Api;

use App\Http\Domain\Rate\RateDomain;
use App\Http\Requests\Post\PostStoreRequest;
use App\Http\Requests\Rate\RateStoreRequest;
use Exception;
use Illuminate\Http\JsonResponse;

class RateController extends ApiController
{
    /**
     * RateController constructor.
     * @param RateDomain $domain
     */
    public function __construct(RateDomain $domain)
    {
        parent::__construct($domain);
    }

    /**
     * @param RateStoreRequest $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function store(RateStoreRequest $request): JsonResponse
    {
        try {
            $this->domain->database()->beginTransaction();
            $item = $this->domain->create($request->all());
            $this->domain->database()->commit();

            return $this->json('', [
                'result' => $item
            ], 201);
        } catch (Exception $exception) {
            return $this->jsonException($this->domain->database(), $exception, $exception->getMessage());
        }
    }
}
