<?php

namespace App\Containers\OrderProduct\Tasks;

use App\Containers\OrderProduct\Data\Repositories\OrderProductRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindOrderProductByIdTask extends Task
{

    protected $repository;

    public function __construct(OrderProductRepository $repository)
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
