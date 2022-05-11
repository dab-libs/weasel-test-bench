<?php declare(strict_types=1);

namespace Weasel\TestBench\Tests\UseCase\Pet\FindPets;

use Dab\Weasel\Fixture;
use Weasel\TestBench\Domain\Pet\Api\CreatePet;
use Weasel\TestBench\Domain\Pet\Api\Pet;

class FindPets_Fixture implements Fixture {
  const PET_1 = 'pet1';
  const PET_2 = 'pet2';

  public Pet $pet1;
  public Pet $pet1_2;
  public Pet $pet2;

  public function __construct(
    private CreatePet $createPet,
  ) {
  }

  public function createData(): void {
    $this->pet1 = $this->createPet->do(self::PET_1, Pet::CAT);
    $this->pet1_2 = $this->createPet->do(self::PET_1, Pet::DOG);
    $this->pet2 = $this->createPet->do(self::PET_2, Pet::CAT);
  }
}