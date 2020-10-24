<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Client\Data\Repositories\ClientRepository;
use App\Ship\Parents\Tasks\Task;

class ClientReportTask extends Task
{

    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
