<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\OrderProduct\Data\Repositories\OrderProductRepository;
use App\Ship\Parents\Tasks\Task;

class OrderProductReportTask extends Task
{

    protected $repository;

    public function __construct(OrderProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
