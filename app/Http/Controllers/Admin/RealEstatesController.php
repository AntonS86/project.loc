<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRealEstateRequest;
use App\Models\RealEstate;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class RealEstatesController extends Controller
{
    /**
     * @var RealEstate
     */
    private $realEstate;
    /**
     * @var string
     */
    private $template;
    /**
     * @var array
     */
    private $varOutput = [];

    /**
     * RealEstatesController constructor.
     *
     * @param RealEstate $realEstate
     */
    public function __construct(RealEstate $realEstate)
    {
        $this->realEstate = $realEstate;
        $this->template   = 'new_admin.realestate';
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|View
     * @throws \Throwable
     */
    public function index(Request $request)
    {
        $this->varOutput['realestates'] = $this->realEstate->fullContent()->paginate(config('settings.market_pagination'));
        if ($request->ajax()) {
            $html = view('new_admin.realestate.realestates_table', $this->varOutput)->render();
            return response()->json(['success' => true, 'content' => $html]);
        }
        return view($this->template)->with($this->varOutput);
    }

    /**
     * @param SearchRealEstateRequest $request
     *
     * @return JsonResponse
     * @throws \Throwable
     */
    public function search(SearchRealEstateRequest $request): JsonResponse
    {
        $inputs                         = $request->except(['submit', '_token']);
        $this->varOutput['realestates'] = $this->realEstate->search($inputs)->fullContent()->paginate(config('settings.market_pagination'));
        $this->varOutput['realestates']->appends($request->all());
        $html = view('new_admin.realestate.realestates_table', $this->varOutput)->render();
        return response()->json(['success' => true, 'content' => $html]);
    }

    public function create()
    {

    }

    public function edit()
    {

    }

    public function delete()
    {

    }
}
