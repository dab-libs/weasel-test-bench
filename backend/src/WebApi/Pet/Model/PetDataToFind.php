<?php

namespace Weasel\TestBench\WebApi\Pet\Model;

class PetDataToFind {
  public function __construct(
    public ?string $id,
    public ?string $name,
  ) {
  }
}