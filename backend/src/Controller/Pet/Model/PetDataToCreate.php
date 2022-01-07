<?php

namespace Weasel\TestBench\Controller\Pet\Model;

class PetDataToCreate {
  public function __construct(
    public string $name,
    public string $species,
  ) {
  }
}