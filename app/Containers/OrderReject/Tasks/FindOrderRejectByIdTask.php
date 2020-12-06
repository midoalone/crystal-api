<?php

namespace App\Containers\OrderReject\Tasks;

use App\Containers\OrderReject\Data\Repositories\OrderRejectRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindOrderRejectByIdTask extends Task
{

    protected $repository;

    public function __construct(OrderRejectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
