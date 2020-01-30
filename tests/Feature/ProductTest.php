<?php

namespace Tests\Feature;

use App\Price;
use App\ProductModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function show_page_add_new_product_link()
    {
        $response = $this->get(route('products'));

        $response->assertStatus(200);
    }

    /** @test */
    public function show_form_add_new_product_link()
    {
        $response = $this->get(route('products'));

        $response->assertStatus(200);
        $response->assertViewIs('product.index');
    }

    /** @test */
    public function submit_new_product_link()
    {
        $this->withoutExceptionHandling();
        
        $response = $this->post(route('products.store'),[
            'url' => 'https://fabelio.com/ip/jobi-chloe-living-set.html',
            'name' => 'Jobi chloe living set',
            'description' => 'Just a test',
            'price' => 'Rp 3.798.400',
            'image_thumb' => 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/6/8/6887_1_.jpg'
        ]);
        
        $this->assertCount(1, ProductModel::all());
    }
    
}
