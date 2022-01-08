<?php

namespace Weasel\TestBench\Tests\WebApi\Pet\CreatePet;

use Dab\Weasel\Fixture;
use Weasel\TestBench\Domain\Pet\Api\CreatePet;
use Weasel\TestBench\Domain\Pet\Api\Pet;

class CreatePet_Fixture implements Fixture {
  const PET_1 = 'pet1';

  public function __construct(
    private CreatePet $createPet,
  ) {
  }

  public function createData(): void {
    $this->createPet->do(self::PET_1, Pet::CAT);
  }
}