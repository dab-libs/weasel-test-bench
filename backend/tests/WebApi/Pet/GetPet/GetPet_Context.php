<?php

namespace Weasel\TestBench\Tests\WebApi\Pet\GetPet;

use Weasel\TestBench\Domain\Pet\DbApi\PetRepository;

class GetPet_Context {
  public function __construct(
    public PetRepository $petRepository,
  ) {
  }
}