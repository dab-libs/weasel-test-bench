<?php

namespace Weasel\TestBench\Domain\Pet\Api;

interface FindPetsByName {
  /**
   * @param string $name
   * @return Pet[]
   */
  public function do(string $name): array;
}