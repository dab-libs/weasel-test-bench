<?php

namespace Weasel\TestBench\Domain\Pet\Model;

abstract class Pet implements \Weasel\TestBench\Domain\Pet\Api\Pet {
  protected string $id;
  protected string $species;
  protected string $name;

  public function getId(): string {
    return $this->id;
  }

  public function setId(string $id): void {
    $this->id = $id;
  }

  public function getSpecies(): string {
    return $this->species;
  }

  public function setSpecies(string $species): void {
    $this->species = $species;
  }

  public function getName(): string {
    return $this->name;
  }

  public function setName(string $name): void {
    $this->name = $name;
  }
}