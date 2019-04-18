<?php


namespace App\Services\Parsers;


use App\Models\Article;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\Log;

class ArticlesSave implements ContentSaveInterface
{

    private const CATEGORY       = 7;
    public const  CATEGORY_ALIAS = 'novosti';

    /**
     * @param array $data
     *
     * @return bool
     */
    public function save(array $data): bool
    {
        Log::info('ArticleSave||begin||');

        foreach ($data as $content) {
            $this->saveHandler($content);
        }

        Log::info('ArticleSave||end||');
        return true;
    }

    /**
     * @param array $data
     */
    private function saveHandler(Array $data): void
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

            $image = Image::firstOrCreate(
                ['path' => $data['image']]
            );

            $article->images()->save($image, ['title' => 'Y']);
        }
    }
}
