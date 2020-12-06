<?php

namespace App\Containers\OrderOption\Tasks;

use App\Containers\OrderOption\Data\Repositories\OrderOptionRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateOrderOptionTask extends Task
{

    protected $repository;

    public function __construct(OrderOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

