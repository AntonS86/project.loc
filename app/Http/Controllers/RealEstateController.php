<?php


namespace App\Http\Controllers;


use App\Models\RealEstate;
use App\Models\Rubric;
use App\Models\Type;
use App\Services\CookieFavService;
use App\Services\MenuService;
use App\Http\Requests\SearchRealEstateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\View\View;

class RealEstateController extends SiteController
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
     * search by advertisement
     *
     * @param SearchRealEstateRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|void
     * @throws \Throwable
     */
    public function search(SearchRealEstateRequest $request)
    {
        $inputs                             = $request->except(['submit', '_token']);
        $this->varOutput['rs_fav_id']       = $this->cookieService->searchCookie(config('settings.realestates_fav'))->get();
        $this->varOutput['realestates_fav'] = $this->realEstate->whereIn('id', $this->varOutput['rs_fav_id'])->published()->fullContent()->get();
        $this->varOutput['realestates']     = $this->realEstate->search($inputs)->published()->fullContent()->paginate(config('settings.market_pagination'));
        $this->varOutput['realestates']->appends($request->all());
        if ($request->ajax()) {
            $html = view('market.ads_content', $this->varOutput)->render();
            return response()->json(['success' => true, 'content' => $html]);
        }
        $request->session()->put($inputs);
        $this->varOutput['rubrics'] = $this->rubric->get();
        $this->varOutput['types']   = $this->type->get();
        return $this->renderOutput();
    }

    /**
     * @param RealEstate $realEstate
     *
     * @return View
     */
    public function show(RealEstate $realEstate): View
    {
        $this->varOutput['rs_fav_id']  = $this->cookieService->searchCookie(config('settings.realestates_fav'))->get();
        $this->varOutput['realestate'] = $realEstate->loadFullContent();
        return $this->renderOutput();
    }


    /**
     * @param RealEstate $realEstate
     *
     * @return JsonResponse
     */
    public function favToggle(RealEstate $realEstate): JsonResponse
    {
        $cookieData = $this->cookieService->searchCookie(config('settings.realestates_fav'))->toggle($realEstate->id)->get();
        return response()->json($cookieData)
                         ->cookie(config('settings.realestates_fav'), $this->cookieService->encode(), config('settings.realestates_fav_time'));
    }

}
