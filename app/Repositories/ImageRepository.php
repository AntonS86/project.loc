<?php

namespace App\Repositories;

use App\Image;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;


class ImageRepository extends Repository
{

    /**
     *
     * @var [string]
     */
    private $savePath;

    public function __construct(Image $image)
    {
        $this->model    = $image;
        $this->savePath = config('settings.articleImageSave');
    }

    /**
     * @param        $image
     * @param string $title
     *
     * @return mixed
     */
    public function save($image, $title = 'N')
    {
                
        $type    = $image->getMimeType();
        $dbName  = date('Y') . DIRECTORY_SEPARATOR . date('m') . DIRECTORY_SEPARATOR . $image->getClientOriginalName();
        $dirsave = $this->savePath . date('Y') . DIRECTORY_SEPARATOR . date('m');

        if (!file_exists(public_path($this->savePath . $dbName))) {
            $img = \Image::make($image);
            $img->resize(1920, 1080, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($dirsave . DIRECTORY_SEPARATOR . $image->getClientOriginalName());
        }

        return $this->model->updateOrCreate(
            ['pathname' => $dbName],
            [
                'type'  => $type,
                'title' => $title
            ]
        );
        
    }


    public function delete($files)
    {
        if ($files instanceof Collection) {
            $files->each(function ($item) {
                $item->delete();
            });
        }
        elseif ($files instanceof Model) {
            $files->delete();
        }
    }

    /**
     * сравнение путей
     * TODO
     *
     * @param [type] $path1
     * @param [type] $path2
     * @return bool
     */
    public function comparePath($path1, $path2): bool
    {
        $path1 =  $this->path_replace($path1, config('settings.articleImageSave'));
        $path2 =  $this->path_replace($path2, config('settings.articleImageSave'));
        
        return $path1 === $path2;
    }


}
