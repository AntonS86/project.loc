<?php


namespace App\Services;


use Illuminate\Http\UploadedFile;

class ImageUploader
{

    private $width;
    private $height;

    private $thumbsWidth;
    private $thumbsHeight;

    private $imagePath;
    private $thumbsPath;

    /**
     * ImageUploader constructor.
     */
    public function __construct()
    {
        $this->width        = config('settings.imageSize')['width'];
        $this->height       = config('settings.imageSize')['height'];
        $this->thumbsWidth  = config('settings.thumbsSize')['width'];
        $this->thumbsHeight = config('settings.thumbsSize')['height'];

        $this->imagePath  = config('settings.imageSave');
        $this->thumbsPath = config('settings.thumbsSave');
    }


    /**
     * @param UploadedFile $file
     *
     * @return string
     * @throws \Exception
     */
    public function save(UploadedFile $file): string
    {
        $pathName = $this->createRelativeFilename();
        $this->createFolder($pathName);
        $img = \Image::make($file);
        $img->resize($this->width, $this->height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($this->imagePath . $pathName);

        $img->resize($this->thumbsWidth, $this->thumbsHeight, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($this->thumbsPath . $pathName);

        return $pathName;
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function createRandomName(): string
    {
        return md5(random_int(0, PHP_INT_MAX) . microtime());
    }

    /**
     * @return string
     * @throws \Exception
     */
    private function createRelativeFilename(): string
    {
        $hash = $this->createRandomName();
        return vsprintf('%s/%s/%s.png', [
            substr($hash, 0, 2),
            substr($hash, 2, 2),
            substr($hash, 4),
        ]);
    }

    /**
     * @param $pathName
     */
    private function createFolder(string $pathName)
    {
        $dir = implode('/', array_slice(explode('/', $pathName), 0, 2));
        if (! file_exists(public_path() . '/' . $this->imagePath . $dir)) {
            mkdir(public_path() . '/' . $this->imagePath . $dir, 0777, true);
        }

        if (! file_exists(public_path() . '/' . $this->thumbsPath . $dir)) {
            mkdir(public_path() . '/' . $this->thumbsPath . $dir, 0777, true);
        }
    }
}
