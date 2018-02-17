<?php

namespace Revys\Revy\App;

class Image extends Entity
{
    /**
     * @var \Intervention\Image\Image
     */
    public $instance;

    /**
     * @var string
     */
    protected $hash;

    public function getInstanceAttribute()
    {
        return $this->instance;
    }

    public function getHash()
    {
        return $this->hash;
    }

    public function setHash()
    {
        return $this->hash = $this->hash();
    }

    public function hash()
    {
        return md5_file($this->instance->basePath());
    }

    /**
     * @param \Closure $callback
     * @return Image
     */
    public function createInstance($callback)
    {
        $this->instance = $callback();

        $this->setHash();

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
}