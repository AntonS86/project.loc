<?php

namespace App\Http\Controllers;


use App\Http\Requests\ImagesUploaderRequest;
use App\Http\Requests\ImageUploaderRequest;
use App\Image;
use App\Services\ImageUploader;


class ImagesController extends Controller
{

    /**
     * @param ImageUploaderRequest $request
     * @param ImageUploader        $uploader
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function createMany(ImagesUploaderRequest $request, ImageUploader $uploader)
    {
        $result = [];
        $files  = $request->allFiles();
        foreach ($files['images'] as $image) {
            $path      = $uploader->save($image);
            $img       = new Image();
            $img->path = $path;
            $img->save();
            $result[] = $img;
        }
        return response()->json($result);
    }


    public function createOne(ImageUploaderRequest $request, ImageUploader $uploader)
    {
        $path      = $uploader->save($request->image);
        $img       = new Image();
        $img->path = $path;
        $img->save();
        return response()->json($img);
    }

}
