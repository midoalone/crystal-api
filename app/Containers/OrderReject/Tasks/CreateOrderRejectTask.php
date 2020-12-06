<?php

namespace App\Containers\OrderReject\Tasks;

use App\Containers\OrderReject\Data\Repositories\OrderRejectRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class CreateOrderRejectTask extends Task
{

    protected $repository;

    public function __construct(OrderRejectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        $repository = $this->repository->create($data);

        

        return $repository;
    }
}

