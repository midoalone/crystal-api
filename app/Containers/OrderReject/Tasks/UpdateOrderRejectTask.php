<?php

namespace App\Containers\OrderReject\Tasks;

use App\Containers\OrderReject\Data\Repositories\OrderRejectRepository;
use App\Ship\Exceptions\UpdateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class UpdateOrderRejectTask extends Task
{

    protected $repository;

    public function __construct(OrderRejectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id, array $data)
    {
        $repository = $this->repository->update($data, $id);

        

        return $repository;
    }
}

