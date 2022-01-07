<?php declare(strict_types=1);

namespace Weasel\TestBench\Domain\Pet\Api;

interface Pet {
  public function getId(): string;
  public function getSpecies(): string;
  public function getName(): string;
}