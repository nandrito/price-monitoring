<?php

namespace App\Console\Commands;

use App\Price;
use App\ProductModel;
use App\Libraries\Scrapping;
use Illuminate\Console\Command;

class UpdatePrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the Price';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
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
