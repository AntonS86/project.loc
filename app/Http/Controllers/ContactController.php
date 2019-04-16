<?php

namespace App\Http\Controllers;

use App\Services\MenuService;


class ContactController extends SiteController
{
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
        $this->template = 'contacts.contact';
    }

    public function index()
    {
        return $this->renderOutput();
    }
}
