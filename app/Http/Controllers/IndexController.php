<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\RealEstate;
use App\Models\Rubric;
use App\Models\Type;
use App\Services\CookieFavService;
use App\Services\MenuService;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class IndexController extends SiteController
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
     * @var RealEstate
     */
    private $realEstate;
    /**
     * @var CookieFavService
     */
    private $cookieService;

    /**
     * IndexController constructor.
     *
     * @param MenuService      $menuService
     * @param Rubric           $rubric
     * @param Type             $type
     * @param RealEstate       $realEstate
     * @param CookieFavService $cookieService
     */
    public function __construct(MenuService $menuService, Rubric $rubric, Type $type, RealEstate $realEstate, CookieFavService $cookieService)
    {
        $this->menuService   = $menuService;
        $this->template      = 'realestate';
        $this->rubric        = $rubric;
        $this->type          = $type;
        $this->realEstate    = $realEstate;
        $this->cookieService = $cookieService;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse|void
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $this->varOutput['rs_fav_id']       = $this->cookieService->searchCookie(config('settings.realestates_fav'))->get();
        $this->varOutput['realestates_fav'] = $this->realEstate->whereIn('id', $this->varOutput['rs_fav_id'])->published()->fullContent()->get();
        $this->varOutput['realestates']     = $this->realEstate->published()->fullContent()->latest()->paginate(config('settings.market_pagination'));
        if ($request->ajax()) {
            $html = view('market.ads_content', $this->varOutput)->render();
            return response()->json(['success' => true, 'content' => $html]);
        }
        $this->varOutput['rubrics'] = $this->rubric->get();
        $this->varOutput['types']   = $this->type->get();
        return $this->renderOutput();
    }


}
