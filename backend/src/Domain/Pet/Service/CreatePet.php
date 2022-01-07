<?php

namespace Weasel\TestBench\Domain\Pet\Service;

use Weasel\TestBench\Domain\Pet\Api\Pet;
use Weasel\TestBench\Domain\Pet\Api;
use Weasel\TestBench\Domain\Pet\DbApi\PetFactory;
use Weasel\TestBench\Domain\Pet\DbApi\PetRepository;
use Ramsey\Uuid\Uuid;

class CreatePet implements Api\CreatePet {
  public function __construct(
    private PetFactory $petFactory,
    private PetRepository $petRepository,
  ) {
  }

  public function do(string $name, string $species): Pet {
    $pet = $this->petFactory->createPet();
    $pet->setId(Uuid::uuid4()->toString());
    $pet->setName($name);
    $pet->setSpecies($species);
    $this->petRepository->put($pet);
    return $pet;
  }
}