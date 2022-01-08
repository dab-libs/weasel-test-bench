<?php

namespace Weasel\TestBench\WebApi\Pet\Service;

use Weasel\TestBench\WebApi\Pet\Model\PetData;
use Weasel\TestBench\Domain\Pet\Api\Pet;

class MapPetToData {
  public function do(Pet $pet): PetData {
    return new PetData(
      id: $pet->getId(),
      name: $pet->getName(),
      species: $pet->getSpecies(),
    );
  }
}