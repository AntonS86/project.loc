<?php

namespace App\Models\Article;

use Illuminate\Support\Str;
use App\Models\Article;

class SlugObserver {

	/**
	 * @param \App\Models\Article $article
	 *
	 * @return void
	 */
	public function creating(Article $article): void
	{
	    $slug = Str::slug($article->title);
		$article->alias = (! Article::where('alias', $slug)->count()) ? $slug : $slug . '-' . md5(microtime());
	}


    /**
     * @param \App\Models\Article $article
     */
	public function updating(Article $article): void
	{
		$article->alias = $this->getSlug($article);
	}


    /**
     * @param \App\Models\Article $article
     *
     * @return string
     */
	private function getSlug(Article $article): string
	{	
		$slug = Str::slug($article->title);

		if (Article::searchSlug($slug, $article->id)->count()) {

			return $slug . '-' . dechex($article->id);
		} else {
			return $slug;
		}
	}
}
