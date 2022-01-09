<?php

namespace Weasel\TestBench\Tests\WebApi\Pet\CreatePet;

use Weasel\TestBench\Domain\Pet\DbApi\PetRepository;

class CreatePet_Context {
  public function __construct(
    public PetRepository $petRepository,
  ) {
  }
}