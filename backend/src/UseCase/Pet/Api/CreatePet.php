<?php

namespace Weasel\TestBench\UseCase\Pet\Api;

use Weasel\TestBench\Domain\Pet\Api\Pet;

interface CreatePet {
  public function do(string $species, string $name): Pet;
}