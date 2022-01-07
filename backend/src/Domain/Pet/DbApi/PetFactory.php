<?php

namespace Weasel\TestBench\Domain\Pet\DbApi;

use Weasel\TestBench\Domain\Pet\Model;

interface PetFactory {
  public function createPet(): Model\Pet;
}