<?php

namespace App\Containers\Category\UI\API\Transformers;

use App\Containers\Category\Models\Category;
use App\Ship\Parents\Transformers\Transformer;

use App\Containers\Category\UI\API\Transformers\CategoryTransformer;
use App\Containers\Product\UI\API\Transformers\ProductTransformer;


class CategoryTransformer extends Transformer
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
'categories',
'products',

    ];

    /**
     * @param Category $entity
     *
     * @return array
     */
    public function transform(Category $entity)
    {
        $response = [
            'object' => 'Category',
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

    	public function includeCategory( Category $item ) {
		return $this->item( $item->category, new CategoryTransformer() );
	}

	public function includeCategories( Category $item ) {
		return $this->collection( $item->categories, new CategoryTransformer() );
	}

	public function includeProducts( Category $item ) {
		return $this->collection( $item->products, new ProductTransformer() );
	}


}
