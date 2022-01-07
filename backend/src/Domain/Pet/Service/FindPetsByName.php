<?php

namespace Weasel\TestBench\Domain\Pet\Service;

use Weasel\TestBench\Domain\Pet\DbApi\PetRepository;
use Weasel\TestBench\Domain\Pet\Api;

class FindPetsByName implements Api\FindPetsByName {
  public function __construct(
    private PetRepository $petRepository,
  ) {
  }

  /** @inheritDoc */
  public function do(string $name): array {
    return $this->petRepository->findPetsByName($name);
  }
}