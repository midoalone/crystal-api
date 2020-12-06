<?php

namespace App\Containers\OrderCancel\Tasks;

use App\Containers\OrderCancel\Data\Repositories\OrderCancelRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateOrderCancelTask extends Task
{

    protected $repository;

    public function __construct(OrderCancelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

