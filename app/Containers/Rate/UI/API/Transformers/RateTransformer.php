<?php

namespace App\Containers\Rate\UI\API\Transformers;

use App\Containers\Rate\Models\Rate;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Order\UI\API\Transformers\OrderTransformer;


class RateTransformer extends Transformer
{
    /**
     * @var  array
     */
    protected $defaultIncludes = [

    ];

    /**
     * @var  array
     */
    protected $availableIncludes = [
        'order',

    ];

    /**
     * @param Rate $entity
     *
     * @return array
     */
    public function transform(Rate $entity)
    {
        $response = [
            'object' => 'Rate',
            'id' => $entity->getHashedKey(),
            'created_at' => $entity->created_at,
            'updated_at' => $entity->updated_at,

        ];

        // Get values of fillables
        $response = $this->fillables( $entity, $response );

        $response = $this->withMedia( $entity, $response, "image" );
        $response = $this->withMedia( $entity, $response, "gallery" );
        $response = $this->withMedia( $entity, $response, "file" );

        $response = $this->ifAdmin([
            'real_id'    => $entity->id,
            // 'deleted_at' => $entity->deleted_at,
        ], $response);

        return $response;
    }

    	public function includeOrder( Rate $item ) {
		return $this->item( $item->order, new OrderTransformer() );
	}


}
