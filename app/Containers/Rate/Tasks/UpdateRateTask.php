<?php

namespace App\Containers\Rate\Tasks;

use App\Containers\Rate\Data\Repositories\RateRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateRateTask extends Task
{

    protected $repository;

    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

