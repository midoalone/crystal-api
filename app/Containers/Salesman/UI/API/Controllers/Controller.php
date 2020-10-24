<?php

namespace App\Containers\Salesman\UI\API\Controllers;

use App\Containers\Salesman\UI\API\Requests\CreateSalesmanRequest;
use App\Containers\Salesman\UI\API\Requests\DeleteSalesmanRequest;
use App\Containers\Salesman\UI\API\Requests\GetAllSalesmenRequest;
use App\Containers\Salesman\UI\API\Requests\FindSalesmanByIdRequest;
use App\Containers\Salesman\UI\API\Requests\UpdateSalesmanRequest;
use App\Containers\Salesman\UI\API\Transformers\SalesmanTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Salesman\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateSalesmanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createSalesman(CreateSalesmanRequest $request)
    {
        $salesman = Apiato::call('Salesman@CreateSalesmanAction', [$request]);

        $this->uploadMedia( $salesman, "image", true );
        $this->uploadMedia( $salesman, "gallery" );
        $this->uploadMedia( $salesman, "file" );

        return $this->created($this->transform($salesman, SalesmanTransformer::class));
    }

    /**
     * @param FindSalesmanByIdRequest $request
     * @return array
     */
    public function findSalesmanById(FindSalesmanByIdRequest $request)
    {
        $salesman = Apiato::call('Salesman@FindSalesmanByIdAction', [$request]);

        return $this->transform($salesman, SalesmanTransformer::class);
    }

    /**
     * @param GetAllSalesmenRequest $request
     * @return array
     */
    public function getAllSalesmen(GetAllSalesmenRequest $request)
    {
        $salesmen = Apiato::call('Salesman@GetAllSalesmenAction', [$request]);

        return $this->transform($salesmen, SalesmanTransformer::class);
    }

    /**
     * @param UpdateSalesmanRequest $request
     * @return array
     */
    public function updateSalesman(UpdateSalesmanRequest $request)
    {
        $salesman = Apiato::call('Salesman@UpdateSalesmanAction', [$request]);

        $this->uploadMedia( $salesman, "image", true );
        $this->uploadMedia( $salesman, "gallery" );
        $this->uploadMedia( $salesman, "file" );

        return $this->transform($salesman, SalesmanTransformer::class);
    }

    /**
     * @param DeleteSalesmanRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteSalesman(DeleteSalesmanRequest $request)
    {
        Apiato::call('Salesman@DeleteSalesmanAction', [$request]);

        return $this->noContent();
    }
}
