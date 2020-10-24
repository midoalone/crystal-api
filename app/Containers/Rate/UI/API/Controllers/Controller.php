<?php

namespace App\Containers\Rate\UI\API\Controllers;

use App\Containers\Rate\UI\API\Requests\CreateRateRequest;
use App\Containers\Rate\UI\API\Requests\DeleteRateRequest;
use App\Containers\Rate\UI\API\Requests\GetAllRatesRequest;
use App\Containers\Rate\UI\API\Requests\FindRateByIdRequest;
use App\Containers\Rate\UI\API\Requests\UpdateRateRequest;
use App\Containers\Rate\UI\API\Transformers\RateTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\Rate\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateRateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createRate(CreateRateRequest $request)
    {
        $rate = Apiato::call('Rate@CreateRateAction', [$request]);

        $this->uploadMedia( $rate, "image", true );
        $this->uploadMedia( $rate, "gallery" );
        $this->uploadMedia( $rate, "file" );

        return $this->created($this->transform($rate, RateTransformer::class));
    }

    /**
     * @param FindRateByIdRequest $request
     * @return array
     */
    public function findRateById(FindRateByIdRequest $request)
    {
        $rate = Apiato::call('Rate@FindRateByIdAction', [$request]);

        return $this->transform($rate, RateTransformer::class);
    }

    /**
     * @param GetAllRatesRequest $request
     * @return array
     */
    public function getAllRates(GetAllRatesRequest $request)
    {
        $rates = Apiato::call('Rate@GetAllRatesAction', [$request]);

        return $this->transform($rates, RateTransformer::class);
    }

    /**
     * @param UpdateRateRequest $request
     * @return array
     */
    public function updateRate(UpdateRateRequest $request)
    {
        $rate = Apiato::call('Rate@UpdateRateAction', [$request]);

        $this->uploadMedia( $rate, "image", true );
        $this->uploadMedia( $rate, "gallery" );
        $this->uploadMedia( $rate, "file" );

        return $this->transform($rate, RateTransformer::class);
    }

    /**
     * @param DeleteRateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteRate(DeleteRateRequest $request)
    {
        Apiato::call('Rate@DeleteRateAction', [$request]);

        return $this->noContent();
    }
}
