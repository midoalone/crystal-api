<?php

namespace App\Containers\OrderReject\UI\API\Transformers;

use App\Containers\OrderReject\Models\OrderReject;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\RejectReason\UI\API\Transformers\RejectReasonTransformer;
use App\Containers\Order\UI\API\Transformers\OrderTransformer;


class OrderRejectTransformer extends Transformer
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
     * @param OrderReject $entity
     *
     * @return array
     */
    public function transform(OrderReject $entity)
    {
        $response = [
            'object' => 'OrderReject',
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

    	public function includeReason( OrderReject $item ) {
		return $this->item( $item->reason, new RejectReasonTransformer() );
	}

	public function includeOrder( OrderReject $item ) {
		return $this->item( $item->order, new OrderTransformer() );
	}


}
