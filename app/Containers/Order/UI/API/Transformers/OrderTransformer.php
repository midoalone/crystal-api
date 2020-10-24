<?php

namespace App\Containers\Order\UI\API\Transformers;

use App\Containers\Order\Models\Order;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Client\UI\API\Transformers\ClientTransformer;
use App\Containers\Event\UI\API\Transformers\EventTransformer;
use App\Containers\Product\UI\API\Transformers\ProductTransformer;
use App\Containers\Salesman\UI\API\Transformers\SalesmanTransformer;
use App\Containers\User\UI\API\Transformers\UserTransformer;
use App\Containers\Address\UI\API\Transformers\AddressTransformer;


class OrderTransformer extends Transformer
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
        'client',
'event',
'products',
'salesman',
'user',
'address',

    ];

    /**
     * @param Order $entity
     *
     * @return array
     */
    public function transform(Order $entity)
    {
        $response = [
            'object' => 'Order',
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

    	public function includeClient( Order $item ) {
		return $this->item( $item->client, new ClientTransformer() );
	}

	public function includeEvent( Order $item ) {
		return $this->item( $item->event, new EventTransformer() );
	}

	public function includeProducts( Order $item ) {
		return $this->collection( $item->products, new ProductTransformer() );
	}

	public function includeSalesman( Order $item ) {
		return $this->item( $item->salesman, new SalesmanTransformer() );
	}

	public function includeUser( Order $item ) {
		return $this->item( $item->user, new UserTransformer() );
	}

	public function includeAddress( Order $item ) {
		return $this->item( $item->address, new AddressTransformer() );
	}


}
