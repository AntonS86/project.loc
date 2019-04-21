<?php


namespace App\Http\Controllers;


use GuzzleHttp\Client;
use Illuminate\Http\Request;

class TestController extends Controller
{

    public function test(Request $request, Client $client)
    {
        $response = $client->get('https://telegram.org', [
            'headers' => [
                'User-Agent'      => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.77 Safari/537.36',
                'Accept'          => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                'Accept-Language' => 'en-US,en;q=0.5',
                'Accept-Encoding' => 'gzip, deflate, br',
                'Connection'      => 'keep-alive',
                'cache-control'   => 'max-age=0',
                'Referer'         => 'https://news.ners.ru'
            ],
            'proxy'   => 'socks5://198.199.120.102:1080',
        ]);
        $response = (string)$response->getBody();
    }

}
