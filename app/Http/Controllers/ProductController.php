<?php

namespace App\Http\Controllers;

use App\Price;
use App\ProductModel;
use App\Libraries\Scrapping;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return view('product.index');
    }

    public function store(Request $request)
    {
        $data = $this->getScrappingData($request);
        
        $create = ProductModel::create($data);
        
        return redirect()->route('products.show', $create->id);
    }

    public function show(ProductModel $productModel)
    {
        $price = Price::where('product_id', $productModel->id)->latest()->paginate(20);
        
        return view('product.show', compact('productModel','price'));
    }

    public function list()
    {
        $product = ProductModel::latest()->paginate(5);
        
        return view('product.list', compact('product'));
    }

    private function getScrappingData($request)
    {
        $scrapping  = new Scrapping();
        return $scrapeData = $scrapping->getScrapeData($request);
    }

    private function validateRequest()
    {
        return request()->validate([
            'url' => 'required|url',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image_thumb' => '',
        ]);
    }
   
}
