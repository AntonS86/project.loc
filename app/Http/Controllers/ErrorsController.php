<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Services\MenuService;


class ErrorsController extends Controller
{
    /**
     * @var MenuService
     */
    private $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function errorsContent()
    {
        $this->varOutput['menu'] = $this->menuService->getMenu();
        $this->varOutput['company'] = Company::with('companyLinks')->first();
        return $this->varOutput;
    }
}
