<?php

namespace App\Containers\Rate\Tasks;

use App\Containers\Rate\Data\Repositories\RateRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateRateTask extends Task
{

    protected $repository;

    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

