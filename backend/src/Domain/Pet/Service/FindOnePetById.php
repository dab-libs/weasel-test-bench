<?php

namespace Weasel\TestBench\Domain\Pet\Service;

use Weasel\TestBench\Domain\Pet\Api;
use Weasel\TestBench\Domain\Pet\DbApi\PetRepository;

class FindOnePetById implements Api\FindOnePetById {
  public function __construct(
    private PetRepository $petRepository,
  ) {
  }

  public function do(string $id): ?Api\Pet {
    return $this->petRepository->findOnePetById($id);
  }
}