<?php


namespace App\Http\View\Composers;


use App\Models\Company;
use App\Services\MenuService;
use Illuminate\View\View;

class AdminComposer
{
    /**
     * @var MenuService
     */
    private $menuService;
    /**
     * @var Company
     */
    private $company;

    /**
     * AdminComposer constructor.
     *
     * @param MenuService $menuService
     * @param Company     $company
     */
    public function __construct(MenuService $menuService, Company $company)
    {

        $this->menuService = $menuService;
        $this->company     = $company;
    }

    public function compose(View $view)
    {
        $varOutput['menu']    = $this->menuService->getAdminMenu();
        $varOutput['company'] = $this->company->first();
        $view->with($varOutput);
    }
}
