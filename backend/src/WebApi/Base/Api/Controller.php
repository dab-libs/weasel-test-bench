<?php

namespace Weasel\TestBench\WebApi\Base\Api;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Weasel\TestBench\WebApi\Base\DbApi\Transaction;

abstract class Controller {
  public function __construct(
    private Transaction $transaction,
  ) {
  }

  public function do(Request $request): Response {
    try {
      $this->transaction->begin();
      $data = $this->mapRequestToData($request);
      $response = $this->handleData($data);
      $this->transaction->commit();
      return $response;
    }
    catch (Exception $exception) {
      $this->transaction->rollback();
      return $this->handleException($exception);
    }
  }

  /** @throws Exception */
  protected abstract function mapRequestToData(Request $request): ?object;

  /** @throws Exception */
  protected abstract function handleData(?object $data): Response;

  protected function handleException(Exception $exception): Response {
    $error = [
      'message' => $exception->getMessage(),
    ];
    $jsonData = json_encode($error, JSON_UNESCAPED_UNICODE);
    $response = new JsonResponse(
      data:   $error,
      status: Response::HTTP_BAD_REQUEST,
    );
    $response->setEncodingOptions(JSON_UNESCAPED_UNICODE);
    return $response;
  }
}