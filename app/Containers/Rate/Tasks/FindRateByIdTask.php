<?php

namespace App\Containers\Rate\Tasks;

use App\Containers\Rate\Data\Repositories\RateRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Exception;

class FindRateByIdTask extends Task
{

    protected $repository;

    public function __construct(RateRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($id)
    {
        try {
            return $this->repository->find($id);
        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
