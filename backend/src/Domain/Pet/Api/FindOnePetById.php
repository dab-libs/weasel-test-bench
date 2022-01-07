<?php

namespace Weasel\TestBench\Domain\Pet\Api;

interface FindOnePetById {
  public function do(string $id): ?Pet;
}