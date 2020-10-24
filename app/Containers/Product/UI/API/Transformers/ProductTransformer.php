<?php

namespace App\Containers\Product\UI\API\Transformers;

use App\Containers\Product\Models\Product;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Category\UI\API\Transformers\CategoryTransformer;


class ProductTransformer extends Transformer
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
        'category',

    ];

    /**
     * @param Product $entity
     *
     * @return array
     */
    public function transform(Product $entity)
    {
        $response = [
            'object' => 'Product',
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

    	public function includeCategory( Product $item ) {
		return $this->item( $item->category, new CategoryTransformer() );
	}


}
