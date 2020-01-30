<?php

namespace App\Libraries;

use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;

class Scrapping {

    public function getScrapeData($request)
    {

        if (!$request->url)
            return;

        $client = new Client(HttpClient::create(['timeout' => 60]));
        $crawler = $client->request('GET', $request->url);
        $dataScrape = [
            'url' => $request->url,
            'name' => $crawler->filter('.page-title')->text(),
            'description' => $crawler->filter('.product-info__description')->text(),
            'price' => $crawler->filter('.price-wrapper')->text(),
            'image_thumb' => $crawler->filterXpath('//meta[@property="og:image"]')->attr('content')
        ];

        return $dataScrape;
    }
}