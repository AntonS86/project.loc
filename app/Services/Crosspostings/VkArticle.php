<?php


namespace App\Services\Crosspostings;


use App\Models\Article;
use Illuminate\Contracts\Support\Arrayable;

/**
 * setting https://vk.com/dev/wall.post
 *
 * Class VkArticle
 * @package App\Services\Crosspostings
 */
class VkArticle implements Arrayable
{
    /**
     * @var Article
     */
    private $article;

    /**
     * @var string
     */
    private $access_token;

    /**
     * @var integer
     */
    private $owner_id;

    /**
     * @var int
     */
    private $from_group = 1;


    /**
     * версия api
     * @var float
     */
    private $v = 5.95;

    /**
     * @var string
     */
    private $attachments;

    /**
     * @var string
     */
    private $message;

    /**
     * VkArticle constructor.
     *
     * @param Article $article
     */
    public function __construct(Article $article)
    {
        $this->article      = $article;
        $this->access_token = config('posting.vk_user_token');
        $this->owner_id     = config('posting.owner_id');
    }

    /**
     * @return VkArticle
     */
    public function postLink(): VkArticle
    {
        $this->attachments = route('articles.show', ['alias' => $this->article->alias]);
        return $this;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        $data = [];
        foreach ($this as $key => $value) {
            if (! empty($value)) {
                $data[$key] = $value;
            }
        }
        return $data;
    }
}
