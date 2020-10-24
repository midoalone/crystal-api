<?php

namespace App\Containers\Reports\Tasks;

use App\Containers\Product\Data\Repositories\ProductRepository;
use App\Ship\Parents\Tasks\Task;

class ProductReportTask extends Task
{

    protected $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run()
    {
        return $this->repository;
    }
}
