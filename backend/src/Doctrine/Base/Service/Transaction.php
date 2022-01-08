<?php

namespace Weasel\TestBench\Doctrine\Base\Service;

use Doctrine\ORM\EntityManagerInterface;

class Transaction implements \Weasel\TestBench\WebApi\Base\DbApi\Transaction {
  public function __construct(
    private EntityManagerInterface $entityManager,
  ) {
  }

  public function begin(): void {
    $this->entityManager->beginTransaction();
  }

  public function commit(): void {
    $this->entityManager->commit();
  }

  public function rollback(): void {
    $this->entityManager->rollback();
  }
}