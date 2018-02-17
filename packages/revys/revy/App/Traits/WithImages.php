<?php

namespace Revys\Revy\App\Traits;

use File;
use Revys\Revy\App\Entity;
use Revys\Revy\App\Image;
use Revys\Revy\App\Images;

trait WithImages
{
    private $images;

    /**
     * Get images collection
     *
     * @param bool $refresh
     * @return Images
     */
    public function images($refresh = false)
    {
        if (! $this->images or $refresh) {
            $this->images = new Images(
                Image::where([
                    'object_id' => $this->id,
                    'model'     => $this->getModelName()
                ])->get()
            );
        }

        return $this->images;
    }

    /**
     * @return array
     */
    public function getImageTypes()
    {
        return [
            'original' => function (Image $image, Entity $object) {
                return $image;
            },
            'slider'   => function (Image $image, Entity $object) {
                return $image->resize(100, 100);
            }
        ];
    }

    /**
     * @param string $type
     * @return \Closure|bool
     */
    public function getImageType($type)
    {
        return $this->getImageTypes()[$type] ?? false;
    }

    public function hasImage(Image $image)
    {
        return false; // @todo check if image exists
    }

    /**
     * @param Image $image
     * @return Image
     */
    public function addImage(Image $image)
    {
        if (! File::isDirectory($this->getImageDir()))
            File::makeDirectory($this->getImageDir(), 0777, true);

        $image->instance->save($this->getImagePath($image));

        Image::create([
            'object_id' => $this->id,
            'model'     => $this->getModelName(),
            'filename'  => $image->instance->basename,
            'hash'      => $image->hash()
        ]);

        $this->images()->push($image);

        return $image;
    }

    public function setImage(Image $image)
    {
        $this->removeImages();

        $this->addImage($image);
    }

    public function addImages(array $images)
    {
        foreach ($images as $image) {
            $this->addImage($image);
        }
    }

    public function getImagesDir()
    {
        return public_path('img/images/' . $this->getModelName() . '/' . $this->id);
    }

    public function getImagePath(Image $image, $type = 'original')
    {
        return $this->getImagesDir() . '/' . $type . '/' . $image->instance->basename;
    }

    public function getImageDir($type = 'original')
    {
        return $this->getImagesDir() . '/' . $type;
    }

    /**
     * @return bool|null
     * @throws \Exception
     */
    public function removeImages()
    {
        File::deleteDirectory($this->getImagesDir());

        $this->images()->clear();

        return Image::where([
            'object_id' => $this->id,
            'model'     => $this->getModelName()
        ])->delete();
    }


    /**
     * @param Image $image
     * @return bool|null
     * @throws \Exception
     */
    public function removeImage(Image $image)
    {
        File::deleteDirectory($this->getImagesDir());

        $this->images()->reject(function ($listImage) use ($image) {
            return $image->instance->basename == $listImage->instance->basename;
        });

        return Image::where([
            'object_id' => $this->id,
            'model'     => $this->getModelName(),
            'filename'  => $image->instance->basename
        ])->delete();
    }
}