<?php

namespace App\Containers\Salesman\Tasks;

use App\Containers\Salesman\Data\Repositories\SalesmanRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateSalesmanTask extends Task
{

    protected $repository;

    public function __construct(SalesmanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        #ManyToMany#

        return $repository;
    }
}

