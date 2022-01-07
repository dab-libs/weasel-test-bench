<?php

namespace Weasel\TestBench\UseCase\Pet\Service;

use Weasel\TestBench\Domain\Pet\Api\Pet;
use Weasel\TestBench\Domain\Pet\Api as PetDomain;
use Weasel\TestBench\UseCase\Pet\Api as PetUseCase;

class CreatePet implements PetUseCase\CreatePet {
  public function __construct(
    private PetDomain\CreatePet $createPet,
  ) {
  }

  public function do(string $species, string $name): Pet {
    return $this->createPet->do($name, $species);
  }
}