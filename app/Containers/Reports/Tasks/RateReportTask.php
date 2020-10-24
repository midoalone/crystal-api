<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Rate\Data\Repositories\RateRepository;
use App\Ship\Parents\Tasks\Task;

class RateReportTask extends Task
{

    protected $repository;

    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
