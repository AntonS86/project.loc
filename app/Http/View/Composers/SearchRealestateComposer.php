<?php


namespace App\Http\View\Composers;

use App\Models\Rubric;
use App\Models\Type;
use Illuminate\View\View;

class SearchRealestateComposer
{
    /**
     * @var Rubric
     */
    private $rubric;
    /**
     * @var Type
     */
    private $type;

    /**
     * SearchRealestateComposer constructor.
     *
     * @param Rubric $rubric
     * @param Type   $type
     */
    public function __construct(Rubric $rubric, Type $type)
    {
        $this->rubric = $rubric;
        $this->type   = $type;
    }

    public function compose(View $view)
    {
        $varOutput['rubrics'] = $this->rubric->get();
        $varOutput['types']   = $this->type->get();
        $view->with($varOutput);
    }
}
