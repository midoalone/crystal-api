<?php

namespace App\Containers\Client\Tasks;

use App\Containers\Client\Data\Repositories\ClientRepository;
use App\Ship\Parents\Tasks\Task;

class GetAllClientsTask extends Task
{

    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository->paginate();
    }
}
