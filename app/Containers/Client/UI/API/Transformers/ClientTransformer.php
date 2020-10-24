<?php

namespace App\Containers\Client\UI\API\Transformers;

use App\Containers\Client\Models\Client;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Address\UI\API\Transformers\AddressTransformer;


class ClientTransformer extends Transformer
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
        'addresses',

    ];

    /**
     * @param Client $entity
     *
     * @return array
     */
    public function transform(Client $entity)
    {
        $response = [
            'object' => 'Client',
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

    	public function includeAddresses( Client $item ) {
		return $this->collection( $item->addresses, new AddressTransformer() );
	}


}
