<?php

namespace App\Containers\OrderOption\Tasks;

use App\Containers\OrderOption\Data\Repositories\OrderOptionRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateOrderOptionTask extends Task
{

    protected $repository;

    public function __construct(OrderOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

