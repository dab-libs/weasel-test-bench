<?php

namespace Weasel\TestBench\Tests\WebApi\Pet\CreatePet;

use Dab\Weasel\WebDbTestCase;
use Weasel\TestBench\Domain\Pet\Api\Pet;

class CreatePet_Test extends WebDbTestCase {
  /** @RequiredForTest) */
  private ?CreatePet_Context $context = null;
  /** @RequiredForTest) */
  private ?CreatePet_Fixture $fixture = null;

  public function testCreate() {
    $petDescription = [
      'name' => $this->fixture::PET_1.'_new',
      'species' => Pet::DOG,
    ];
    $this->client->request(
      method: 'POST',
      uri: '/pets',
      content: json_encode($petDescription, JSON_UNESCAPED_UNICODE),
    );
    $content = $this->client->getResponse()->getContent();
    $createdPet = json_decode($content, true);

    self::assertArrayHasKey('id', $createdPet);
    self::assertNotNull($createdPet['id']);
    self::assertEquals($petDescription['name'], $createdPet['name']);
    self::assertEquals($petDescription['species'], $createdPet['species']);
  }

  public function testNewName() {
    $petDescription = [
      'name' => $this->fixture::PET_1.'_new',
      'species' => Pet::DOG,
    ];
    $this->client->request(
      method: 'POST',
      uri: '/pets',
      content: json_encode($petDescription, JSON_UNESCAPED_UNICODE),
    );

    $pets = $this->context->petRepository->findPetsByName($petDescription['name']);
    self::assertCount(1, $pets);
  }

  public function testExistName() {
    $petDescription = [
      'name' => $this->fixture::PET_1,
      'species' => Pet::DOG,
    ];
    $this->client->request(
      method: 'POST',
      uri: '/pets',
      content: json_encode($petDescription, JSON_UNESCAPED_UNICODE),
    );

    $pets = $this->context->petRepository->findPetsByName($petDescription['name']);
    self::assertCount(2, $pets);
  }
}