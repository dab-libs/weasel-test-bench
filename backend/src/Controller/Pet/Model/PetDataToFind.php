<?php

namespace Weasel\TestBench\Controller\Pet\Model;

class PetDataToFind {
  public function __construct(
    public ?string $name,
    public ?string $species,
  ) {
  }
}