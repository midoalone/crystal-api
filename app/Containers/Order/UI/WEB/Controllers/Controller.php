<?php

namespace App\Containers\Order\UI\WEB\Controllers;

use App\Containers\Category\Models\Category;
use App\Containers\Order\Models\Order;
use App\Containers\OrderProduct\Models\OrderProduct;
use App\Ship\Parents\Controllers\WebController;
use Illuminate\Support\Facades\App;
use PDF;

/**
 * Class Controller
 *
 * @author  Mohamed Tawfik <contact@mohamedtawfik.me>
 */
class Controller extends WebController {

  /**
   * @return  \Illuminate\Http\Response
   */
  public function getQuotation( $id ) {

    $types = [
      "men"        => 'رجال',
      "women"      => 'نساء',
      "Family Mix" => 'تجمع عائلي'
    ];

    $order    = Order::with( 'user' )->find( $id );
    $products = $order->products->toArray();

    $categories = [];
    foreach ( $products as $product ) {
      $categories[] = $product['category_id'];
    }

    $categories = array_unique( $categories );

    $groups = [];

    foreach ( $categories as $category ) {
      $filteredProducts = array_filter( $products, function ( $product ) use ( $category ) {
        return $product['category_id'] == $category;
      } );

      $price = 0;
      $orderProducts = OrderProduct::where('order_id', $id)->whereIn('product_id', array_column($filteredProducts, "id"))->get();

      foreach ($orderProducts as $orderProduct) {
        $price += $orderProduct->total;
      }

      $groups[] = [
        "price" => $price,
        "products" => $filteredProducts,
        "category" => Category::find( $category ),
      ];
    }

    $pdf = App::make( 'snappy.pdf.wrapper' );
    $pdf->loadView( 'order::quotation', compact( 'order', 'types', 'groups' ) );

    return $pdf->inline();
  }
}
