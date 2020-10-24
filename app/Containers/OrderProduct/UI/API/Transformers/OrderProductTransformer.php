<?php

namespace App\Containers\OrderProduct\UI\API\Transformers;

use App\Containers\OrderProduct\Models\OrderProduct;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Order\UI\API\Transformers\OrderTransformer;
use App\Containers\Product\UI\API\Transformers\ProductTransformer;


class OrderProductTransformer extends Transformer
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
'product',

    ];

    /**
     * @param OrderProduct $entity
     *
     * @return array
     */
    public function transform(OrderProduct $entity)
    {
        $response = [
            'object' => 'OrderProduct',
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

    	public function includeOrder( OrderProduct $item ) {
		return $this->item( $item->order, new OrderTransformer() );
	}

	public function includeProduct( OrderProduct $item ) {
		return $this->item( $item->product, new ProductTransformer() );
	}


}
