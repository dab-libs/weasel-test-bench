<?php

namespace Weasel\TestBench\Domain\Pet\DbApi;

use Weasel\TestBench\Domain\Pet\Model\Pet;

interface PetRepository {
  public function put(Pet $pet): void;

  public function findOnePetById(string $id): ?Pet;

  public function findPetsByName(string $name);
}