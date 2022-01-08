<?php

namespace Weasel\TestBench\Tests\WebApi\Pet\CreatePet;

use Dab\Weasel\WebDbTestCase;

class CreatePet_Test extends WebDbTestCase {
  /** @RequiredForTest) */
  private ?CreatePet_Fixture $fixture = null;

  public function test() {
    self::assertNotNull($this->fixture);
  }
}