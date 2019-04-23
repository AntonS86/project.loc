<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @var string
     */
    protected $template;

    /**
     * IndexController constructor.
     */
    public function __construct()
    {
        $this->template = 'new_admin.index';
    }


    /**
     * @return View
     */
    public function index(): View
    {
        return view($this->template);
    }
}
