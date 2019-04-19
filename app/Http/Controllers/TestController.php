<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function Test(Request $request)
    {
        $inputs = $request->all();
        Storage::disk('local')->put('file.txt', json_encode($inputs));
        return response()->json($inputs);
    }
}
