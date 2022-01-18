<?php

namespace Weasel\TestBench\Tests\WebApi\Pet\GetPet;

use Dab\Weasel\Fixture;
use Weasel\TestBench\Domain\Pet\Api\CreatePet;
use Weasel\TestBench\Domain\Pet\Api\Pet;

class GetPet_Fixture implements Fixture {
  const PET_1 = 'pet1';
  const PET_2 = 'pet2';
  const PET_3 = 'pet3';

  public Pet $pet1;
  public Pet $pet2;
  public Pet $pet3;
  public Pet $pet4;

  public function __construct(
    private CreatePet $createPet,
  ) {
  }

  public function createData(): void {
    $this->pet1 = $this->createPet->do(self::PET_1, Pet::CAT);
    $this->pet2 = $this->createPet->do(self::PET_2, Pet::DOG);
    $this->pet3 = $this->createPet->do(self::PET_3, Pet::CAT);
    $this->pet4 = $this->createPet->do(self::PET_3, Pet::DOG);
  }
}