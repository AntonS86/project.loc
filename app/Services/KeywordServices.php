<?php


namespace App\Services;


use App\Keyword;
use Illuminate\Support\Str;

class KeywordServices
{
    /**
     * @var Keyword
     */
    private $model;

    public function __construct()
    {
        $this->model = new Keyword();
    }

    /**
     * @param array $keywords
     *
     * @return Array
     */
    public function save(array $keywords): Array
    {
        $keywordsId = [];
        foreach ($keywords as $keyword) {
            if (empty($keyword)) continue;
            $alias        = Str::slug($keyword);
            $keywordsId[] = $this->model->firstOrCreate(
                ['alias' => $alias],
                ['name' => trim($keyword)]
            )->id;
        }
        return $keywordsId;
    }
}
