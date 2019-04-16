<?php


namespace App\Services;


use App\Article;
use App\Image;
use Illuminate\Support\Arr;

/**
 * Class ArticleUpdate
 * @package App\Services
 */
class ArticleUpdate
{
    /**
     * @var Article
     */
    private $article;

    /**
     * @var array $inputs
     */
    private $inputs = [];


    /**
     * @var array
     */
    private $response = [];


    /**
     * ArticleUpdate constructor.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @param array $inputs
     */
    public function update(array $inputs)
    {
        $this->inputs = $inputs;

        $this->imagesSync();

        if (Arr::has($this->inputs, 'titleImage')) {
            $this->titleImageSync();
        }

        $this->keywordsSync();
        $this->save();
    }


    /**
     * синхронизация фото
     */
    private function imagesSync(): void
    {
        $images   = $this->inputs['images'];
        $imagesId = [];
        if ($images) {
            $images   = $this->imageCurrentPath($images);
            $imagesId = Image::whereIn('path', $images)->pluck('id');
        }
        $this->article->images()->sync($imagesId);
        $this->response['images'] = 'ok';
    }

    /**
     *
     */
    private function titleImageSync(): void
    {
        $this->article->images()->attach($this->inputs['titleImage'], ['title' => 'Y']);
        $this->response['titleImage'] = 'ok';
    }


    /**
     * обрезаем путь
     *
     * @param $images
     *
     * @return array
     */
    private function imageCurrentPath($images): array
    {
        $pattern = '#' . config('settings.imageSave') . '(\w{2}/\w{2}/\w{28}.png)$#';
        $paths   = [];
        foreach ($images as $image) {
            if (preg_match($pattern, $image, $matches)) {
                $paths[] = $matches[1];
            }
        }
        return $paths;
    }

    /**
     * @return array
     */
    public function getResponse(): array
    {
        return $this->response;
    }


    /**
     * обновление ключей
     */
    private function keywordsSync(): void
    {
        $keywordsIds = [];
        if (Arr::has($this->inputs, 'keywords')) {
            $keywordsIds = (new KeywordServices)->save(explode('#', $this->inputs['keywords']));
        }
        $this->article->keywords()->sync($keywordsIds);
        $this->response['keywords'] = 'ok';
    }

    /**
     *
     */
    private function save(): void
    {
        $data = Arr::except($this->inputs, ['_method', 'keywords', 'images', 'titleImage']);
        $this->article->fill($data);

        $this->response['article'] = ($this->article->update()) ? 'ok' : 'error';
    }


}
