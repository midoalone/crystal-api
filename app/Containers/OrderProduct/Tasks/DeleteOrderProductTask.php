<?php

namespace App\Containers\OrderProduct\Tasks;

use App\Containers\OrderProduct\Data\Repositories\OrderProductRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteOrderProductTask extends Task
{

    protected $repository;

    public function __construct(OrderProductRepository $repository)
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
