<?php declare(strict_types=1);

namespace Weasel\TestBench\Tests\UseCase\Pet\FindPets;

use Weasel\TestBench\UseCase\Pet\Api\FindPets;

class FindPets_Context {
  public function __construct(
    public FindPets $findPets,
  ) {
  }
}