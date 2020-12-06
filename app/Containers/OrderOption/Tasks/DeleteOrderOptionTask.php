<?php

namespace App\Containers\OrderOption\Tasks;

use App\Containers\OrderOption\Data\Repositories\OrderOptionRepository;
use App\Ship\Exceptions\DeleteResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class DeleteOrderOptionTask extends Task
{

    protected $repository;

    public function __construct(OrderOptionRepository $repository)
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
