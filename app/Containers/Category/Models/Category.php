<?php

namespace App\Containers\Category\Models;

use App\Containers\Product\Models\Product;
use App\Ship\Parents\Models\Model;


class Category extends Model {
  protected $fillable = [
    #Fillables#
    'name_en',
    'name_ar',
    'description_en',
    'description_ar',
    'is_product_category',
    'parent_id'
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
  protected $resourceKey = 'categories';
  protected $table = 'category';

  public function category() {
    return $this->belongsTo( Category::class, 'parent_id' );
  }

  public function categories() {
    return $this->hasMany( Category::class, 'parent_id' );
  }

  public function products() {
    return $this->hasMany( Product::class, 'category_id' );
  }


}
