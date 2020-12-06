<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\OrderOption\Data\Repositories\OrderOptionRepository;
use App\Ship\Parents\Tasks\Task;

class OrderOptionReportTask extends Task
{

    protected $repository;

    public function __construct(OrderOptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
