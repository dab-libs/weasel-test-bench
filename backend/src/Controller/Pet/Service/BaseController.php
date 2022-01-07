<?php

namespace Weasel\TestBench\Controller\Pet\Service;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseController {
  public function handleRequest(Request $request): Response {
    try {
      $data = $this->mapRequestToData($request);
      return $this->handleData($data);
    }
    catch (Exception $exception) {
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
    return new JsonResponse($error, Response::HTTP_BAD_REQUEST);
  }
}