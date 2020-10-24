<?php

namespace App\Containers\Reports\UI\API\Controllers;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class Controller
 *
 * @package App\Containers\Reports\UI\API\Controllers
 */
class Controller extends ApiController {
  public function getAllReports( Request $request ) {
    $data  = $request->all();
    $model = Str::studly( $data['endpoint'] );

    $repository = Apiato::call( "Reports@{$model}ReportTask", [], [ 'addRequestCriteria' ] );
    $allData    = $repository->all();

    $summary = [];
    $columns = explode( ";", $request->summary );
    foreach ( $columns as $column ) {
      $sumData = explode( ":", $column );
      $col     = $sumData[0];
      $type    = $sumData[1];

      switch ( $type ) {
        case "sum":
          $summary[] = [ "column" => $col, "formula" => $type, "value" => $allData->sum( $col ) ];
          break;
        case "avg":
          $summary[] = [ "column" => $col, "formula" => $type, "value" => $allData->average( $col ) ];
          break;
        case "count":
          $summary[] = [ "column" => $col, "formula" => $type, "value" => $allData->count( $col ) ];
          break;
        case "min":
          $summary[] = [ "column" => $col, "formula" => $type, "value" => $allData->min( $col ) ];
          break;
        case "max":
          $summary[] = [ "column" => $col, "formula" => $type, "value" => $allData->max( $col ) ];
          break;
      }
    }


    return $summary;
  }
}
