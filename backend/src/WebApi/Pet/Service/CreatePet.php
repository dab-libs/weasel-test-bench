<?php declare(strict_types=1);

namespace Weasel\TestBench\WebApi\Pet\Service;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Weasel\TestBench\WebApi\Base\Api\Controller;
use Weasel\TestBench\WebApi\Base\DbApi\Transaction;
use Weasel\TestBench\WebApi\Pet\Model\PetDataToCreate;
use Weasel\TestBench\UseCase\Pet\Api as PetUseCase;

class CreatePet extends Controller {
  public function __construct(
    Transaction                  $transaction,
    private PetUseCase\CreatePet $createPet,
    private MapPetToData         $mapPetsToDataArray,
  ) {
    parent::__construct($transaction);
  }

  /** @inheritdoc */
  protected function mapRequestToData(Request $request): ?object {
    $jsonRequestBody = $request->getContent();
    $petData = json_decode($jsonRequestBody, true);
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
    $assocPet = $this->mapPetsToDataArray->do($pet);
    $json = json_encode($assocPet, JSON_UNESCAPED_UNICODE);
    return new JsonResponse(data: $json, json: true);
  }
}