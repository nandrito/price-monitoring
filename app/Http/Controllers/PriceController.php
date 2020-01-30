<?php

namespace App\Http\Controllers;

use App\Price;
use App\ProductModel;
use App\Libraries\Scrapping;

class PriceController extends Controller
{
    public function updatePrice()
    {
        $product = ProductModel::all();
        
        foreach ($product as $key => $value) {
            $scrapping  = new Scrapping();
            $scrapeData = $scrapping->getScrapeData($value);
            
            $data = [
                'product_id' => $value->id,
                'price' => $scrapeData['price']
            ];

            $id = Price::create($data)->id;

            echo "insert historical price {$id} for product {$value->id}\n";
        }
    }
}
