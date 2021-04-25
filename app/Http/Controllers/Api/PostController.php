<?php

namespace App\Http\Controllers\Api;

use App\Http\Domain\Post\PostDomain;
use App\Http\Requests\Post\PostStoreRequest;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends ApiController
{
    /**
     * PostController constructor.
     * @param PostDomain $domain
     */
    public function __construct(PostDomain $domain)
    {
        parent::__construct($domain);
    }

    /**
     * @param PostStoreRequest $request
     * @return JsonResponse
     * @throws \Throwable
     */
    public function store(PostStoreRequest $request): JsonResponse
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
