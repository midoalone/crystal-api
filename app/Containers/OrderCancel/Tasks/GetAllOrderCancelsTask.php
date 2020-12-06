<?php

namespace App\Containers\OrderCancel\Tasks;

use App\Containers\OrderCancel\Data\Repositories\OrderCancelRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllOrderCancelsTask extends Task
{

    protected $repository;

    public function __construct(OrderCancelRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
