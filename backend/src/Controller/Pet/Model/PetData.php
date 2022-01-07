<?php

namespace Weasel\TestBench\Controller\Pet\Model;

class PetData {
  public function __construct(
    public string $id,
    public string $name,
    public string $species,
  ) {
  }
}