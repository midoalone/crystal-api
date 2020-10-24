<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Event\Data\Repositories\EventRepository;
use App\Ship\Parents\Tasks\Task;

class EventReportTask extends Task
{

    protected $repository;

    public function __construct(EventRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
