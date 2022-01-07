<?php

namespace Weasel\TestBench\Doctrine\Pet\Model;

use Weasel\TestBench\Domain\Pet\Api;

class PetFactory implements \Weasel\TestBench\Domain\Pet\DbApi\PetFactory {
  public function create(): Api\Pet {
    return new Pet();
  }
}