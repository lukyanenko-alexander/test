<?php

namespace App\Traits;

use Exception;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\JsonResponse;

trait ResponseTrait
{
    /**
     * @param DatabaseManager $database
     * @param Exception $exception
     * @param string $message
     * @param int $status
     * @return JsonResponse
     * @throws \Throwable
     */
    protected function jsonException(DatabaseManager $database, Exception $exception, string $message = '', int $status = 500): JsonResponse
    {
        $database->rollBack();

        if (empty($message)) {
            $message = $exception->getMessage();
        }

        return response()->json(['message' => $message], $status);
    }

    /**
     * @param string $message
     * @param array $append
     * @param int $status
     * @return JsonResponse
     */
    protected function json(string $message = '', array $append = [], $status = 200): JsonResponse
    {
        if (empty($message)) {
            $message = 'Successfully executed.';
        }

        $response = $this->getResponseContent($message);

        if (! empty($append)) {
            $response = array_merge($response, $append);
        }

        return response()->json($response, $status);

    }

    /**
     * @param string $message
     * @return string[]
     */
    private function getResponseContent(string $message): array
    {
        return ['message' => $message];
    }
}
