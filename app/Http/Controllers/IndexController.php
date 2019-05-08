<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\RealEstate;
use App\Models\Rubric;
use App\Models\Type;
use App\Services\MenuService;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends SiteController
{

    /**
     * @var Slider
     */
    protected $slider;
    /**
     * @var Rubric
     */
    private $rubric;
    /**
     * @var Type
     */
    private $type;
    /**
     * @var RealEstate
     */
    private $realEstate;

    /**
     * IndexController constructor.
     *
     * @param MenuService $menuService
     * @param Rubric      $rubric
     * @param Type        $type
     * @param RealEstate  $realEstate
     */
    public function __construct(MenuService $menuService, Rubric $rubric, Type $type, RealEstate $realEstate)
    {
        $this->menuService = $menuService;
        $this->template    = 'index';
        $this->rubric      = $rubric;
        $this->type        = $type;
        $this->realEstate  = $realEstate;
    }

    /**
     * @param Request $request
     *
     * @return View/JsonResponse
     */
    public function index(Request $request)
    {
        /*$this->varOutput['offers'] = Offer::get();
        $this->varOutput['slider'] = Slider::get();*/
        $this->varOutput['ads'] = $this->realEstate->fullContent()->paginate(config('settings.market_pagination'));
        if ($request->ajax()) {
            $html = view('market.ads_content', $this->varOutput)->render();
            return response()->json(['success' => true, 'content' => $html]);
        }
        $this->varOutput['rubrics'] = $this->rubric->get();
        $this->varOutput['types']   = $this->type->get();
        return $this->renderOutput();
    }

}
