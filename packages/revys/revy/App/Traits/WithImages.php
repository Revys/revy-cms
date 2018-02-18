<?php

namespace Revys\Revy\App\Traits;

use File;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Intervention\Image\Exception\NotFoundException;
use Revys\Revy\App\Entity;
use Revys\Revy\App\Image;

trait WithImages
{
    /**
     * @return HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'object_id', 'id');
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
                return $image->getInstance()->resize(100, 100);
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

    /**
     * @param Image $image
     * @return Image
     */
    public function addImage(Image $image)
    {
        $image->setObject($this);

        $image->object_id = $this->id;
        $image->model = $this->getModelName();
        $image->filename = $image->getInstance()->basename;

        if (! File::isDirectory($image->getDir()))
            File::makeDirectory($image->getDir(), 0777, true);

        $image->getInstance()->save($image->getPath());

        $image->hash = $image->hash();

        $image->save();

        return $image;
    }

    /**
     * @param Image $image
     * @throws \Exception
     */
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
        return \Storage::disk('public')->path('img/images/' . $this->getModelName() . '/' . $this->id);
    }

    /**
     * @param string $image
     * @param string $type
     * @return string
     */
    public function getImagePath($image, $type = 'original')
    {
        return $this->getImageDir($type) . '/' . $image;
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

        return Image::where([
            'object_id' => $this->id,
            'model'     => $this->getModelName()
        ])->delete();
    }


    /**
     * @param string|Image $image
     * @return bool|null
     * @throws \Exception
     */
    public function removeImage($image)
    {
        if (! ($image instanceof Image)) {
            $image = $this->getImage($image);
        }

        File::delete($image->getPath());

        return Image::where([
            'object_id' => $this->id,
            'model'     => $this->getModelName(),
            'filename'  => $image->filename
        ])->delete();
    }

    /**
     * @param string $imageName
     * @return Image
     * @throws NotFoundException
     */
    public function getImage($imageName)
    {
        $image = Image::where([
            'object_id' => $this->id,
            'model'     => $this->getModelName(),
            'filename'  => $imageName
        ])->first();

        if (! $image)
            throw new NotFoundException('Image could not be found [' . $imageName . ']');

        $image->setObject($this);

        return $image;
    }
}