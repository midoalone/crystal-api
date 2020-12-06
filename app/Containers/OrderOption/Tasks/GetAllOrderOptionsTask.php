<?php

namespace App\Containers\OrderOption\Tasks;

use App\Containers\OrderOption\Data\Repositories\OrderOptionRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllOrderOptionsTask extends Task
{

    protected $repository;

    public function __construct(OrderOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
