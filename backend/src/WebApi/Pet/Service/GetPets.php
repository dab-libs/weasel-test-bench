<?php declare(strict_types=1);

namespace Weasel\TestBench\WebApi\Pet\Service;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Weasel\TestBench\WebApi\Base\Api\Controller;
use Weasel\TestBench\WebApi\Base\DbApi\Transaction;
use Weasel\TestBench\WebApi\Pet\Model\PetDataToFind;
use Weasel\TestBench\UseCase\Pet\Api as PetUseCase;

class GetPets extends Controller {
  public function __construct(
    Transaction                 $transaction,
    private PetUseCase\FindPets $findPets,
    private MapPetsToDataArray  $mapPetsToDataArray,
  ) {
    parent::__construct($transaction);
  }

  /** @inheritdoc */
  protected function mapRequestToData(Request $request): ?object {
    $petDataToFind = new PetDataToFind(
      id:    $request->query->get('id'),
      name:    $request->query->get('name'),
    );
    if ($petDataToFind->name === null && $petDataToFind->id === null) {
      throw new WrongPetFindParametersException();
    }
    return $petDataToFind;
  }

  /** @inheritdoc */
  protected function handleData(?object $data): Response {
    /** @var PetDataToFind $data */
    $pets = $this->findPets->do($data->id, $data->name);
    $petDataArray = $this->mapPetsToDataArray->do($pets);
    return new JsonResponse($petDataArray);
  }
}