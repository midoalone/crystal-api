<?php

namespace App\Containers\OrderOption\UI\API\Transformers;

use App\Containers\OrderOption\Models\OrderOption;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\OrderProduct\UI\API\Transformers\OrderProductTransformer;
use App\Containers\Option\UI\API\Transformers\OptionTransformer;


class OrderOptionTransformer extends Transformer
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
        'product',
'option',

    ];

    /**
     * @param OrderOption $entity
     *
     * @return array
     */
    public function transform(OrderOption $entity)
    {
        $response = [
            'object' => 'OrderOption',
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

    	public function includeProduct( OrderOption $item ) {
		return $this->item( $item->product, new OrderProductTransformer() );
	}

	public function includeOption( OrderOption $item ) {
		return $this->item( $item->option, new OptionTransformer() );
	}


}
