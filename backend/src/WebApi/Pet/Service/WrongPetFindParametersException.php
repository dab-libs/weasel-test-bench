<?php

namespace Weasel\TestBench\WebApi\Pet\Service;

class WrongPetFindParametersException extends \Exception {
  public function __construct() {
    parent::__construct('Неправильные параметры поиска петов');
  }
}