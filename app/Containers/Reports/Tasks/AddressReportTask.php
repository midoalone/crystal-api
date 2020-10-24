<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Address\Data\Repositories\AddressRepository;
use App\Ship\Parents\Tasks\Task;

class AddressReportTask extends Task
{

    protected $repository;

    public function __construct(AddressRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
