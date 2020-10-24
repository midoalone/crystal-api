<?php

namespace App\Containers\Salesman\Tasks;

use App\Containers\Salesman\Data\Repositories\SalesmanRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllSalesmenTask extends Task
{

    protected $repository;

    public function __construct(SalesmanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
