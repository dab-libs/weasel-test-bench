<?php

namespace Weasel\TestBench\Doctrine\Pet\Model;

use Weasel\TestBench\Domain\Pet\Model;

class PetFactory implements \Weasel\TestBench\Domain\Pet\DbApi\PetFactory {
  public function createPet(): Model\Pet {
    return new Pet();
  }
}