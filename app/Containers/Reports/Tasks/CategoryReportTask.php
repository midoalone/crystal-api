<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Category\Data\Repositories\CategoryRepository;
use App\Ship\Parents\Tasks\Task;

class CategoryReportTask extends Task
{

    protected $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
