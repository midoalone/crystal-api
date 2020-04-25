<?php

namespace App\Ship\Criterias\Eloquent;

use App\Ship\Parents\Criterias\Criteria;
use Illuminate\Http\Request;
use Prettus\Repository\Contracts\RepositoryInterface as PrettusRepositoryInterface;

/**
 * Class FilterCriteria.
 *
 * @author  Mohamed Tawfik <contact@mohamedtawfik.me>
 */
class FilterCriteria extends Criteria {

  /**
   * @var Request
   */
  protected $request;

  public function __construct( Request $request ) {
    $this->request = $request;
  }

  /**
   * @param $model
   * @param PrettusRepositoryInterface $repository
   *
   * @return mixed
   */
  public function apply( $model, PrettusRepositoryInterface $repository ) {
    $request = $this->request;
    if ( $request->filtering ) {
      $filters = $request->filtering;
      if ( is_array( $filters ) ) {
        foreach ( $filters as $filter ) {
          $filter     = json_decode( $filter );
          $filterType = $filter->filter;
          $value      = $filter->value;
          $key        = $filter->key;

          // Relation filter
          if ( strstr( $key, "include," ) ) {
            $parts = explode(",", $key);
            $key = $parts[1];
            $field = $parts[2];

            if($field) {
              $model = $model->whereHas( $key, function ( $query ) use ( $field, $value, $filterType ) {
                switch ( $filterType ) {
                  case "=":
                    if ( is_array( $value ) ) {
                      $query->whereIn( $field, $value );
                    } else {
                      $query->where( $field, $value );
                    }
                    break;
                  case "like":
                    $query->where( $field, 'like', "%$value%" );
                    break;
                  case "range":
                    $compare = '>=';
                    if ( strstr( $field, "_to" ) ) {
                      $compare = '<=';
                    }

                    $query->where( str_replace( [ "_from", "_to" ], "", $field ), $compare, $value );
                    break;
                }
              } );
            }
          } // Normal filter
          else {
            switch ( $filterType ) {
              case "=":
                if ( is_array( $value ) ) {
                  $model = $model->whereIn( $key, $value );
                } else {
                  $model = $model->where( $key, $value );
                }
                break;
              case "like":
                $model = $model->where( $key, 'like', "%$value%" );
                break;
              case "range":
                $compare = '>=';
                if ( strstr( $key, "_to" ) ) {
                  $compare = '<=';
                }

                $model = $model->where( str_replace( [ "_from", "_to" ], "", $key ), $compare, $value );
                break;
            }
          }
        }
      }
    }

    return $model;
  }

}
