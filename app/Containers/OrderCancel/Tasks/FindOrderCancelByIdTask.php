<?php

namespace App\Containers\OrderCancel\Tasks;

use App\Containers\OrderCancel\Data\Repositories\OrderCancelRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindOrderCancelByIdTask extends Task
{

    protected $repository;

    public function __construct(OrderCancelRepository $repository)
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
