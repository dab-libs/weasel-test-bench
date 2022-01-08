<?php

namespace Weasel\TestBench\WebApi\Pet\Service;

use Exception;

class PetNameNotFoundException extends Exception {
  public function __construct() {
    parent::__construct('Нет имени пета');
  }
}