<?php declare(strict_types=1);

namespace Sprut\Tests;

use Sprut\Module\Interactor\Public\AuthenticatedInteractor;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class AuthenticatedKernelTestCase extends KernelTestCase {
  public function setUp(): void {
    parent::setUp();
    static::bootKernel();
    static::$container->set(AuthenticatedInteractor::class, $this->createMock(AuthenticatedInteractor::class));
  }
}