<?php

namespace Weasel\TestBench\UseCase\Pet\Service;

use Weasel\TestBench\Domain\Pet\Api as PetDomain;
use Weasel\TestBench\UseCase\Pet\Api as PetUseCase;

class FindPets implements PetUseCase\FindPets {
  public function __construct(
    private PetDomain\FindPetsByName $findPetsByName,
    private PetDomain\FindOnePetById $findOnePetById,
  ) {
  }

  /** @inheritdoc */
  public function do(?string $id, ?string $name): array {
    if ($id === null && $name === null) {
      throw new \InvalidArgumentException('$id и $name не могут быть null');
    }
    if ($id !== null) {
      return $this->findById($id, $name);
    }
    return $this->findByName($name);
  }

  /**
   * @param string $name
   * @return PetDomain\Pet[]
   */
  private function findByName(string $name): array {
    return $this->findPetsByName->do($name);
  }

  /**
   * @param string $id
   * @param string|null $name
   * @return PetDomain\Pet[]
   */
  private function findById(string $id, ?string $name): array {
    $pet = $this->findOnePetById->do($id);
    if ($pet === null) {
      return [];
    }
    if ($name !== null) {
      if ($pet->getName() !== $name) {
        return [];
      }
    }
    return [$pet];
  }
}