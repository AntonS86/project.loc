<?php

namespace App\Http\Controllers;

use App\Services\Hoovers\HooverNewsServices;
use Illuminate\Http\Request;

class HooverNewsController extends Controller
{

    public function index(HooverNewsServices $hooverNewsServices)
    {
        $hooverNewsServices->getNews();
    }
}
