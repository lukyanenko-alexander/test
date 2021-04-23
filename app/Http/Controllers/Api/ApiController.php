<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Domain\BaseDomain;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    use ResponseTrait;

    protected $domain;

    public function __construct(BaseDomain $domain)
    {
        $this->domain = $domain;
    }

    public function index(array $relations = []): JsonResponse
    {
        return $this->json('', [
            'result' => $this->domain->all($relations)
        ]);
    }

    public function show(string $id): JsonResponse
    {
        return $this->json('', [
            'result' => $this->domain->show($id)
        ]);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $item = $this->domain->show($id);
        try {
            $this->domain->database()->beginTransaction();
            $item = $this->domain->update($item, $request->all());
            $this->domain->database()->commit();

            return $this->json('', [
                'result' => $item
            ]);
        } catch (Exception $exception) {
            $this->jsonException($this->domain->database(), $exception, $exception->getMessage());
        }
    }

    public function store(Request $request): JsonResponse
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

    public function destroy(string $id): JsonResponse
    {
        $item = $this->domain->show($id);
        try {
            $this->domain->database()->beginTransaction();
            $this->domain->destroy($item);
            $this->domain->database()->commit();

            return response()->json([
                'result' => 'Successfully executed'
            ], 200);
        } catch (Exception $exception) {
            return $this->jsonException($this->domain->database(), $exception, $exception->getMessage());
        }
    }
}
