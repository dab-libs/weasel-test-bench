<?php

namespace Weasel\TestBench\WebApi\Pet\Service;

use Weasel\TestBench\WebApi\Pet\Model\PetData;
use Weasel\TestBench\Domain\Pet\Api\Pet;

class MapPetsToDataArray {
  public function __construct(
    private MapPetToData $mapPetToData,
  ) {
  }

  /**
   * @param Pet[] $pets
   * @return PetData[]
   */
  public function do(array $pets): array {
    $petDataArray = [];
    foreach ($pets as $pet) {
      $petDataArray[] = $this->mapPetToData->do($pet);
    }
    return $petDataArray;
  }
}