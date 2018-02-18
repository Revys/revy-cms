<?php

namespace Revys\Revy\App;

use Revys\Revy\App\Traits\WithImages;

/**
 * @property int object_id
 * @property string filename
 * @property string model
 * @property string hash
 */
class Image extends Entity
{
    /**
     * @var \Intervention\Image\Image
     */
    protected $instance;

    /**
     * @var null|WithImages
     */
    protected $object;

    public function getInstance()
    {
//        if ($this->instance === null)
//            $this->instance = \Image::make();

        return $this->instance;
    }

    /**
     * @return null|WithImages
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * @param Entity|WithImages $object
     * @return self
     */
    public function setObject($object)
    {
        $this->object = $object;

        return $this;
    }

    public function hash()
    {
        return md5_file($this->getInstance()->basePath());
    }

    /**
     * @param \Closure $callback
     * @return Image
     */
    public function createInstance($callback)
    {
        $this->instance = $callback();

//        $this->setHash();

        return $this;
    }

    /**
     * @param \Closure $callback
     * @return Image
     */
    public static function new($callback)
    {
        return app(Image::class)->createInstance($callback);
    }

    public function getDir($type = 'original')
    {
        return $this->object->getImageDir($type);
    }

    public function getPath($type = 'original')
    {
        return $this->getDir($type) . '/' . $this->filename;
    }
}