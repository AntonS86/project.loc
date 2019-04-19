<?php

namespace App\Models\Image;


use App\Models\Image;

class DeleteObserver
{

    /**
     * @param Image $image
     *
     * @return void
     */
    public function deleting(Image $image): void
    {
        if (file_exists(public_path($image->asset_path))) {
            unlink(public_path($image->asset_path));
        }

        if (file_exists(public_path($image->asset_thumbs_path))) {
            unlink(public_path($image->asset_thumbs_path));
        }
    }
}

