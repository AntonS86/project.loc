<?php

namespace App\Services\Hoovers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use App\Repositories\ArticleRepository;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Class HooverNewsServices
 * @package App\Services\Hoovers
 */
class HooverNewsServices
{

    private const FEED_URL      = 'https://news.ners.ru/rss';
    private const CATEGORY      = 7;
    private const CATEGORY_NAME = 'news';

    /**
     * @var Client
     */
    private $client;

    /**
     * @var ArticleRepository
     */
    private $articleRepository;

    /**
     * HooverNewsServices constructor.
     *
     * @param Client $client
     */
    public function __construct()
    {
        $this->client            = new Client(['cookie' => true]);
        $this->articleRepository = new ArticleRepository(new Article());
    }


    /**
     * @return void
     */
    public function getNews(): void
    {
        $this->parsing();
        print 'Success';
    }


    /**
     * @return \Generator
     */
    private function parsingRss(): \Generator
    {
        $article = $this->articleRepository->getArticlesForParsingNews(self::CATEGORY_NAME);

        $response = $this->client->get(self::FEED_URL);
        $body     = (string)$response->getBody();

        $rss = new \SimpleXMLElement($body);

        foreach ($rss->xpath('//item') as $node) {

            $title       = (string)$node->title;
            $link        = (string)$node->link;
            $description = (string)$node->description;
            $category    = (string)$node->category;
            $pubDate     = (string)$node->pubDate;

            if ($article->published_at > Carbon::parse($pubDate)) break;

            yield [
                'title'       => $title,
                'link'        => $link,
                'description' => $description,
                'category'    => $category
            ];
        }
    }

    /**
     * @return void
     */
    private function parsing(): void
    {
        foreach ($this->parsingRss() as $data) {

            $response = $this->client->get($data['link']);
            $body     = (string)$response->getBody();

            [$data['image'], $data['text']] = $this->parsingContent($body);
            $this->save($data);
        }
    }

    /**
     * @param array $data
     *
     * @return void
     */
    private function save(array $data): void
    {
        $category = Category::firstOrCreate(
            ['title' => $data['category']],
            ['parent' => self::CATEGORY]
        );


        $article              = new Article();
        $article->title       = $data['title'];
        $article->desc        = $data['description'];
        $article->meta_desc   = $data['description'];
        $article->text        = $data['text'];
        $article->status      = 'published';
        $article->category_id = $category->id;
        $article->save();

        if ($data['image']) {

            $image           = Image::firstOrCreate(
                ['pathname'     => $data['image']],
                ['type'         => 'url', 'title' => 'Y']
            );

            $article->images()->save($image);
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
            $content = $content->each(function (Crawler $node, $i) {
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
