<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\OrderReject\Data\Repositories\OrderRejectRepository;
use App\Ship\Parents\Tasks\Task;

class OrderRejectReportTask extends Task
{

    protected $repository;

    public function __construct(OrderRejectRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
