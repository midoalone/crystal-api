<?php

namespace App\Containers\Salesman\Tasks;

use App\Containers\Salesman\Data\Repositories\SalesmanRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteSalesmanTask extends Task
{

    protected $repository;

    public function __construct(SalesmanRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->delete($id);
        }
        catch (Exception $exception) {
            throw new DeleteResourceFailedException();
        }
    }
}
