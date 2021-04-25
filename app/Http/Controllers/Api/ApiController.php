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

    /**
     * @var BaseDomain
     */
    protected $domain;

    /**
     * ApiController constructor.
     * @param BaseDomain $domain
     */
    public function __construct(BaseDomain $domain)
    {
        $this->domain = $domain;
    }

    /**
     * @param array $relations
     * @return JsonResponse
     */
    public function index(array $relations = []): JsonResponse
    {
        return $this->json('', [
            'result' => $this->domain->all($relations)
        ]);
    }

    /**
     * @param string $id
     * @return JsonResponse
     */
    public function show(string $id): JsonResponse
    {
        return $this->json('', [
            'result' => $this->domain->show($id)
        ]);
    }

    /**
     * @param string $id
     * @return JsonResponse
     * @throws \Throwable
     */
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
