<?php

namespace App\Containers\Salesman\Tasks;

use App\Containers\Salesman\Data\Repositories\SalesmanRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateSalesmanTask extends Task
{

    protected $repository;

    public function __construct(SalesmanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        #ManyToMany#

        return $repository;
    }
}

