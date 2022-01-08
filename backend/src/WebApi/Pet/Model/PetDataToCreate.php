<?php

namespace Weasel\TestBench\WebApi\Pet\Model;

class PetDataToCreate {
  public function __construct(
    public string $name,
    public string $species,
  ) {
  }
}