<?php

namespace App\Http\Controllers;

use App\Offer;
use App\Services\MenuService;
use App\Slider;
use Illuminate\Contracts\View\View;

class IndexController extends SiteController
{

    /**
     * @var Slider
     */
    protected $slider;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
        $this->template    = 'index';
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $this->varOutput['offers'] = Offer::get();
        $this->varOutput['slider'] = Slider::get();
        return $this->renderOutput();
    }

}
