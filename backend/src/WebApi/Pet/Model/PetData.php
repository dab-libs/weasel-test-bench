<?php

namespace Weasel\TestBench\WebApi\Pet\Model;

class PetData {
  public function __construct(
    public string $id,
    public string $name,
    public string $species,
  ) {
  }
}