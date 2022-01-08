<?php declare(strict_types=1);

namespace Weasel\TestBench\Domain\Pet\Api;

interface Pet {
  public const CAT = 'cat';
  public const DOG = 'dog';

  public function getId(): string;

  public function getSpecies(): string;

  public function getName(): string;
}