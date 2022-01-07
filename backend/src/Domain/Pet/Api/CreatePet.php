<?php

namespace Weasel\TestBench\Domain\Pet\Api;

interface CreatePet {
  public function do(string $name, string $species): Pet;
}