<?php

namespace Weasel\TestBench\UseCase\Pet\Api;

use Weasel\TestBench\Domain\Pet\Api\Pet;

interface FindPets {
  /**
   * @param string|null $id
   * @param string|null $name
   * @return Pet[]
   */
  public function do(?string $id, ?string $name): array;
}