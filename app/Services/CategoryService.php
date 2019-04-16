<?php


namespace App\Services;


use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\CategoryDestroyRequest;
use Illuminate\Database\Eloquent\Collection;

class CategoryService
{


    /**
     * @param CategoryDestroyRequest $request
     *
     * @return bool
     * @throws \Exception
     */
    public function delete(CategoryDestroyRequest $request): bool
    {
        $inputs = $request->only('id');
        $categories = Category::whereIn('id', $inputs['id'])->with('children')->get();
        $ids = $this->getAllId($categories);
        $this->articlesDelete($ids);
        return Category::destroy($ids);
    }

    /**
     * @param array $ids
     */
    private function articlesDelete(array $ids): void
    {
        foreach(Article::whereIn('category_id', $ids)->get() as $article) {
            $article->delete();
        }
    }

    /**
     * @param Collection $categories
     *
     * @return array
     */
    private function getAllId(Collection $categories): array
    {
        $categoryId = [];
        foreach($categories as $category) {
            $categoryId[$category->id] = true;
            if ($category->children) {
                foreach($category->children as $children) {
                    $categoryId[$children->id] = true;
                }
            }
        }
        return array_keys($categoryId);
    }
}
