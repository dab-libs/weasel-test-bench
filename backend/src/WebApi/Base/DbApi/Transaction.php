<?php

namespace Weasel\TestBench\WebApi\Base\DbApi;

interface Transaction {
  public function begin(): void;

  public function commit(): void;

  public function rollback(): void;
}