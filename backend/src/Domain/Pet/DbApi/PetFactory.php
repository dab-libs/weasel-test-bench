<?php

namespace Weasel\TestBench\Domain\Pet\DbApi;

use Weasel\TestBench\Domain\Pet\Api;

interface PetFactory {
  public function create(): Api\Pet;
}