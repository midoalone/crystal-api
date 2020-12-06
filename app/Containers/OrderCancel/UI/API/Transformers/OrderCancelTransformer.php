<?php

namespace App\Containers\OrderCancel\UI\API\Transformers;

use App\Containers\OrderCancel\Models\OrderCancel;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\CancelReason\UI\API\Transformers\CancelReasonTransformer;
use App\Containers\Order\UI\API\Transformers\OrderTransformer;


class OrderCancelTransformer extends Transformer
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
        'reason',
'order',

    ];

    /**
     * @param OrderCancel $entity
     *
     * @return array
     */
    public function transform(OrderCancel $entity)
    {
        $response = [
            'object' => 'OrderCancel',
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

    	public function includeReason( OrderCancel $item ) {
		return $this->item( $item->reason, new CancelReasonTransformer() );
	}

	public function includeOrder( OrderCancel $item ) {
		return $this->item( $item->order, new OrderTransformer() );
	}


}
