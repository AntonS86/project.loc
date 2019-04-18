<?php


namespace App\Services\Parsers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class NersParser implements DataProviderInterface
{
    /**
     *
     */
    private const FEED_URL = 'https://news.ners.ru/rss';

    /**
     * @var Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new Client(['cookie' => true]);
    }

    /**
     * @param \DateTime $lastDate
     *
     * @return array
     */
    public function getLast(\DateTime $lastDate): array
    {
        Log::info(self::FEED_URL . '||begin||');
        $result = [];
        foreach ($this->parsingRss($lastDate) as $data) {

            $response = $this->client->get($data['link']);
            $body     = (string)$response->getBody();

            [$data['image'], $data['text']] = $this->parsingContent($body);
            //$this->save($data);
            $result[] = $data;
        }
        Log::info(self::FEED_URL . '||finished||success||');
        return $result;
    }


    /**
     * @param \DateTime $lastDate
     *
     * @return \Generator
     */
    private function parsingRss(\DateTime $lastDate): \Generator
    {
        $response = $this->client->get(self::FEED_URL);
        $body     = (string)$response->getBody();

        $rss = new \SimpleXMLElement($body);

        foreach ($rss->xpath('//item') as $node) {

            $title       = (string)$node->title;
            $link        = (string)$node->link;
            $description = (string)$node->description;
            $category    = (string)$node->category;
            $pubDate     = (string)$node->pubDate;

            if ($lastDate > Carbon::parse($pubDate)) break;

            yield [
                'title'       => $title,
                'link'        => $link,
                'description' => $description,
                'category'    => $category
            ];
        }
    }


    /**
     * @param string $body
     *
     * @return array
     */
    private function parsingContent(string $body): array
    {
        $crawler   = new Crawler($body);
        $author    = $this->getAuthor($crawler);
        $source    = $this->getSource($crawler);
        $imageLink = $this->getImageLink($crawler);
        $text      = $this->getText($crawler);
        $textHtml  = $this->getTextHtml([$author, $source, $imageLink, $text]);
        return [
            $imageLink,
            $textHtml
        ];
    }

    /**
     * @param Crawler $crawler
     *
     * @return string|null
     */
    private function getAuthor(Crawler $crawler): ?string
    {
        $author = $crawler->filter('#news_view .author');
        return ($author->count()) ? $author->text() : null;
    }

    /**
     * @param Crawler $crawler
     *
     * @return string|null
     */
    private function getSource(Crawler $crawler): ?string
    {
        $source = $crawler->filter('#news_view .source');
        return ($source->count()) ? $source->html() : null;
    }

    /**
     * @param Crawler $crawler
     *
     * @return string|null
     */
    private function getImageLink(Crawler $crawler): ?string
    {
        $imageLink = $crawler->filter('#news_view .text figcaption > a');
        if (! $imageLink->count()) return null;
        //TODO : доделать сбор изображений
        $href = $imageLink->attr('href');
        return preg_match('#^https?:\/\/.*?\.(jpg|jpeg|png|gif)$#', $href) ? $href : null;
    }

    /**
     *
     * @param Crawler $crawler
     *
     * @return string|null
     */
    private function getText(Crawler $crawler): ?string
    {
        $content = $crawler->filter('#news_view .text > p');

        if ($content->count()) {
            $content = $content->each(function (Crawler $node) {
                return $node->html();
            });
        } else {
            return null;
        }
        $content = array_filter($content, function ($v, $k) {
            if ($k < 1) return false;
            if (empty($v)) return false;
            return true;
        }, ARRAY_FILTER_USE_BOTH);

        return '<p>' . implode('</p><p>', $content) . '</p>';
    }

    /**
     * форматирование в готовый текст
     *
     * @param array $content
     *
     * @return string
     */
    private function getTextHtml(array $content): string
    {
        [$author, $source, $imageLink, $text] = $content;
        $textHtml = $text ?? '';
        $textHtml .= '<p>';
        $textHtml .= ($author) ? 'Автор: ' . $author : '';
        $textHtml .= ($source) ? '<br>' . $source : '';
        $textHtml .= ($imageLink) ? '<br><a href="' . $imageLink . '" target="_blank">Источник фотографии</a>' : '';
        $textHtml .= '</p>';
        return $textHtml;
    }
}
