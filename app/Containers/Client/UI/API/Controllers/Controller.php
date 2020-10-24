<?php

namespace App\Containers\Client\UI\API\Controllers;

use App\Containers\Client\UI\API\Requests\CreateClientRequest;
use App\Containers\Client\UI\API\Requests\DeleteClientRequest;
use App\Containers\Client\UI\API\Requests\GetAllClientsRequest;
use App\Containers\Client\UI\API\Requests\FindClientByIdRequest;
use App\Containers\Client\UI\API\Requests\UpdateClientRequest;
use App\Containers\Client\UI\API\Transformers\ClientTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Client\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateClientRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createClient(CreateClientRequest $request)
    {
        $client = Apiato::call('Client@CreateClientAction', [$request]);

        $this->uploadMedia( $client, "image", true );
        $this->uploadMedia( $client, "gallery" );
        $this->uploadMedia( $client, "file" );

        return $this->created($this->transform($client, ClientTransformer::class));
    }

    /**
     * @param FindClientByIdRequest $request
     * @return array
     */
    public function findClientById(FindClientByIdRequest $request)
    {
        $client = Apiato::call('Client@FindClientByIdAction', [$request]);

        return $this->transform($client, ClientTransformer::class);
    }

    /**
     * @param GetAllClientsRequest $request
     * @return array
     */
    public function getAllClients(GetAllClientsRequest $request)
    {
        $clients = Apiato::call('Client@GetAllClientsAction', [$request]);

        return $this->transform($clients, ClientTransformer::class);
    }

    /**
     * @param UpdateClientRequest $request
     * @return array
     */
    public function updateClient(UpdateClientRequest $request)
    {
        $client = Apiato::call('Client@UpdateClientAction', [$request]);

        $this->uploadMedia( $client, "image", true );
        $this->uploadMedia( $client, "gallery" );
        $this->uploadMedia( $client, "file" );

        return $this->transform($client, ClientTransformer::class);
    }

    /**
     * @param DeleteClientRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteClient(DeleteClientRequest $request)
    {
        Apiato::call('Client@DeleteClientAction', [$request]);

        return $this->noContent();
    }
}
