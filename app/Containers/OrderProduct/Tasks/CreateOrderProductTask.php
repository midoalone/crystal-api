<?php

namespace App\Containers\OrderProduct\Tasks;

use App\Containers\OrderProduct\Data\Repositories\OrderProductRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateOrderProductTask extends Task
{

    protected $repository;

    public function __construct(OrderProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

