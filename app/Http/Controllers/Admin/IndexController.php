<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\WorkMessage;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * @var string
     */
    protected $template;

    /**
     *
     * @var array
     */
    private $varOutput = [];


    /**
     * IndexController constructor.
     *
     * @param WorkMessage $workMessage
     */
    public function __construct(WorkMessage $workMessage)
    {
        $this->template = 'new_admin.index';
    }


    /**
     * @return View
     */
    public function index(): View
    {
        return view($this->template)->with($this->varOutput);
    }
}
