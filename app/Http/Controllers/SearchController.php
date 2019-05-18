<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesSearch;
use App\Http\Requests\SearchAreaRequest;
use App\Http\Requests\SearchCityRequest;
use App\Http\Requests\SearchDistrictRequest;
use App\Http\Requests\SearchStreetRequest;
use App\Http\Requests\SearchRegionRequest;
use App\Http\Requests\SearchVillageRequest;
use App\Models\Area;
use App\Models\City;
use App\Models\District;
use App\Models\Region;
use App\Models\Street;
use App\Models\Village;
use App\Repositories\ArticleRepository;
use Illuminate\Http\JsonResponse;


class SearchController extends Controller
{
    private $articlesRepository;

    /**
     * SearchController constructor.
     *
     * @param ArticleRepository $articleRepository
     */
    public function __construct(ArticleRepository $articleRepository)
    {
        $this->articlesRepository = $articleRepository;
    }

    /**
     * @param ArticlesSearch $request
     *
     * @return JsonResponse
     */
    public function searchArticles(ArticlesSearch $request): JsonResponse
    {
        $articles = $this->articlesRepository->searchArticles($request->search);
        return response()->json($articles);
    }

    /**
     * @param SearchStreetRequest $request
     * @param Street              $street
     *
     * @return JsonResponse
     */
    public function searchStreet(SearchStreetRequest $request, Street $street): JsonResponse
    {
        $result = $street->search($request->street_name)->take(50)->get();
        return response()->json($result);
    }

    /**
     * @param SearchRegionRequest $request
     * @param Region              $region
     *
     * @return JsonResponse
     */
    public function searchRegion(SearchRegionRequest $request, Region $region): JsonResponse
    {
        $result = $region->search($request->region_name)->take(50)->get();
        return response()->json($result);
    }


    /**
     * @param SearchAreaRequest $request
     * @param Area              $area
     *
     * @return JsonResponse
     */
    public function searchArea(SearchAreaRequest $request, Area $area): JsonResponse
    {
        $result = $area->search($request->area_name)->take(50)->get();
        return response()->json($result);
    }

    /**
     * @param SearchCityRequest $request
     * @param City              $city
     *
     * @return JsonResponse
     */
    public function searchCity(SearchCityRequest $request, City $city): JsonResponse
    {
        $result = $city->search($request->city_name)->take(50)->get();
        return response()->json($result);
    }

    /**
     * @param SearchVillageRequest $request
     * @param Village              $village
     *
     * @return JsonResponse
     */
    public function searchVillage(SearchVillageRequest $request, Village $village): JsonResponse
    {
        $result = $village->search($request->village_name)->take(50)->get();
        return response()->json($result);
    }

    public function searchDistrict(SearchDistrictRequest $request, District $village): JsonResponse
    {
        $result = $village->search($request->district_name)->take(50)->get();
        return response()->json($result);
    }
}
