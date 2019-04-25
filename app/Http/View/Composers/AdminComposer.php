<?php


namespace App\Http\View\Composers;


use App\Models\Company;
use App\Models\WorkMessage;
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
     * @var WorkMessage
     */
    private $workMessage;

    /**
     * AdminComposer constructor.
     *
     * @param MenuService $menuService
     * @param Company     $company
     * @param WorkMessage $workMessage
     */
    public function __construct(MenuService $menuService, Company $company, WorkMessage $workMessage)
    {

        $this->menuService = $menuService;
        $this->company     = $company;
        $this->workMessage = $workMessage;
    }

    public function compose(View $view)
    {
        $varOutput['messages'] = $this->workMessage->allContent()->get();
        $varOutput['menu']     = $this->menuService->getAdminMenu();
        $varOutput['company']  = $this->company->first();
        $view->with($varOutput);
    }
}
