<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;
use Illuminate\Database\Query\Builder;

/**
 * Class UserOrdersCriteria
 *
 * @author Mohamed Tawfik <fabian.widmann@gmail.com>
 */
class UserOrdersCriteria extends Criteria
{

    public function __construct()
    {

    }

    /**
     *
     * @param  Builder $model
     * @param \Prettus\Repository\Contracts\RepositoryInterface $repository
     *
     * @return  mixed
     */
    public function apply($model, PrettusRepositoryInterface $repository)
    {
        return $model->where('status', '!=', 'draft');
    }

}
