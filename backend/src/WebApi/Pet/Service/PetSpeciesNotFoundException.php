<?php

namespace Weasel\TestBench\WebApi\Pet\Service;

use Exception;

class PetSpeciesNotFoundException extends Exception {
  public function __construct() {
    parent::__construct('Нет вида пета');
  }
}