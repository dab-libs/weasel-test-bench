<?php

namespace Weasel\TestBench\Doctrine\Pet\Model;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectRepository;
use Weasel\TestBench\Domain\Pet\Model;
use Weasel\TestBench\Domain\Pet\DbApi;

class PetRepository implements DbApi\PetRepository {
  private ObjectRepository $objectRepository;

  public function __construct(
    private EntityManagerInterface $entityManager,
  ) {
    $this->objectRepository = $this->entityManager->getRepository(Pet::class);
  }

  public function put(Model\Pet $pet): void {
    $this->entityManager->persist($pet);
  }

  public function findOnePetById(string $id): ?Model\Pet {
    return $this->objectRepository->findOneBy(['id' => $id]);
  }

  /**
   * @param string $name
   * @return Model\Pet[]
   */
  public function findPetsByName(string $name): array {
    $all = $this->objectRepository->findAll();
    return $this->objectRepository->findBy(['name' => $name]);
  }
}