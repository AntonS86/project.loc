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
     */
    public function saveHandler(array $data): void
    {
        Log::info('ArticleSave||begin||');

        foreach ($data as $content) {
            $this->save($content);
        }

        Log::info('ArticleSave||end||');
    }

    /**
     * @param array $data
     *
     * @return bool
     */
    public function save(Array $data): bool
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
        $result               = $article->save();

        if ($data['image']) {

            $image = Image::firstOrCreate(
                ['path' => $data['image']]
            );

            $article->images()->save($image, ['title' => 'Y']);
        }
        Log::info('ArticleSave||id: ' . $article->id . '||');
        return $result;
    }
}
