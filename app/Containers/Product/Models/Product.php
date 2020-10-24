<?php

namespace App\Containers\Product\Models;

use App\Ship\Parents\Models\Model;

use App\Containers\Category\Models\Category;


class Product extends Model
{
    protected $fillable = [
      #Fillables#
		'name_en',
		 'name_ar',
		 'description_en',
		 'description_ar',
		 'price',
		 'unit',
		 'category_id'
    ];

    protected $attributes = [

    ];

    protected $hidden = [

    ];

    protected $casts = [

    ];

    protected $appends = [

    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /**
     * A resource key to be used by the the JSON API Serializer responses.
     */
    protected $resourceKey = 'products';
    protected $table = 'product';

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }


}
