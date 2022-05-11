<?php

namespace Weasel\TestBench\Tests\WebApi\Pet\GetPet;

use Dab\Weasel\WebDbTestCase;
use Weasel\TestBench\Domain\Pet\Api\Pet;
use Weasel\TestBench\Domain\Pet\DbApi\PetRepository;

class GetPet_Test extends WebDbTestCase {
  /** @RequiredForTest) */
  private ?PetRepository $petRepository = null;
  /** @RequiredForTest) */
  private ?GetPet_Fixture $fixture = null;

  public function testGetById() {
    $this->client->request(
      method: 'GET',
      uri: '/pets?id=' .  $this->fixture->pet1->getId(),
    );

    $statusCode = $this->client->getResponse()->getStatusCode();
    self::assertEquals(200, $statusCode);

    $content = $this->client->getResponse()->getContent();
    $pets = json_decode($content, true);

    self::assertCount(1, $pets);
    $this->assertPetEquals($this->fixture->pet1,$pets[0]);
  }

  public function testFailGetById() {
    $this->client->request(
      method: 'GET',
      uri: '/pets?id=100000000',
    );

    $statusCode = $this->client->getResponse()->getStatusCode();
    self::assertEquals(200, $statusCode);

    $content = $this->client->getResponse()->getContent();
    $pets = json_decode($content, true);
    self::assertCount(0, $pets);
  }

  public function testGetByName() {
    $this->client->request(
      method: 'GET',
      uri: '/pets?name=' .  $this->fixture->pet3->getName(),
    );

    $statusCode = $this->client->getResponse()->getStatusCode();
    self::assertEquals(200, $statusCode);

    $content = $this->client->getResponse()->getContent();
    $pets = json_decode($content, true);

    self::assertCount(2, $pets);
    $this->assertPetEquals($this->fixture->pet3,$pets[0]);
    $this->assertPetEquals($this->fixture->pet4,$pets[1]);
  }

  private function assertPetEquals(Pet $expected, array $actual) {
    self::assertEquals($expected->getId(), $actual['id']);
    self::assertEquals($expected->getName(), $actual['name']);
    self::assertEquals($expected->getSpecies(), $actual['species']);
  }
}