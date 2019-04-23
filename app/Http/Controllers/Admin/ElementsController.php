<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\View\View;

class ElementsController extends Controller
{

    /**
     * @var string
     */
    protected $template;

    /**
     * ElementsController constructor.
     */
    public function __construct()
    {
        $this->template = 'new_admin.element';
    }


    /**
     * @return View
     */
    public function index(): View
    {
        return view($this->template);
    }
}
