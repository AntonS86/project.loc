<?php


namespace App\Services\Crosspostings;

use App\Models\Article;
use GuzzleHttp\Client;


class VkPosting implements PostingInterface
{
    private const URL = 'https://api.vk.com/method/wall.post';
    /**
     * @var Client
     */
    private $client;

    /**
     * VkPosting constructor.
     *
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array $query
     *
     * @return string
     */
    public function send(array $query): string
    {
        $response = $this->client->get(self::URL, ['query' => $query]);
        return (string)$response->getBody();
    }
}
