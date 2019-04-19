<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{
    public function Test(Request $request)
    {
        $inputs = file_get_contents('https://api.vk.com/method/wall.post?owner_id=-181334545&from_group=1&signed=1&message=%22Tanya%22&access_token=bb7eccc60108f0555aad2939a977749b86f8cedb1fcfaa503efedf3dcabecd7dab7918cfd08afefd72af5&v=5.95');

        Storage::disk('local')->put('file.txt', json_encode($inputs));
        return response()->json($inputs);
    }
}
