<?php

namespace App\Containers\OrderCancel\Tasks;

use App\Containers\OrderCancel\Data\Repositories\OrderCancelRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateOrderCancelTask extends Task
{

    protected $repository;

    public function __construct(OrderCancelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

