<?php declare(strict_types=1);

namespace Weasel\TestBench\Tests\UseCase\Pet\FindPets;

use Dab\Weasel\DbTestCase;

class FindPets_Test extends DbTestCase {
  /** @RequiredForTest) */
  private ?FindPets_Context $context = null;
  /** @RequiredForTest) */
  private ?FindPets_Fixture $fixture = null;

  public function testFindTwoByName() {
    $pets = $this->context->findPets->do(null, $this->fixture::PET_1);
    self::assertTrue(in_array($this->fixture->pet1, $pets));
    self::assertTrue(in_array($this->fixture->pet1_2, $pets));
    self::assertFalse(in_array($this->fixture->pet2, $pets));
  }

  public function testFindOneByName() {
    $pets = $this->context->findPets->do(null, $this->fixture::PET_2);
    self::assertCount(1, $pets);
    self::assertEquals($this->fixture->pet2, $pets[0]);
  }

  public function testFindOneById() {
    $pets = $this->context->findPets->do($this->fixture->pet1->getId(), null);
    self::assertCount(1, $pets);
    self::assertEquals($this->fixture->pet1, $pets[0]);
  }
}