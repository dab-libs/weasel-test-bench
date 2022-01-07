<?php declare(strict_types=1);

namespace Weasel\TestBench\Controller\Pet\Service;

use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Weasel\TestBench\Controller\Pet\Model\PetDataToCreate;
use Weasel\TestBench\UseCase\Pet\Api as PetUseCase;

class CreatePet extends BaseController {
  public function __construct(
    private PetUseCase\CreatePet $createPet,
    private MapPetToData         $mapPetToAssoc,
  ) {
  }

  /** @inheritdoc */
  protected function mapRequestToData(Request $request): ?object {
    $jsonRequestBody = $request->getContent();
    $petData = json_decode($jsonRequestBody);
    if (!array_key_exists('name', $petData)) {
      throw new PetNameNotFoundException();
    }
    if (!array_key_exists('species', $petData)) {
      throw new PetSpeciesNotFoundException();
    }
    return new PetDataToCreate(
      name:    $petData['name'],
      species: $petData['species'],
    );
  }

  /** @inheritdoc */
  protected function handleData(?object $data): Response {
    /** @var PetDataToCreate $data */
    $pet = $this->createPet->do($data->species, $data->name);
    $assocPet = $this->mapPetToAssoc->do($pet);
    return new JsonResponse($assocPet);
  }
}