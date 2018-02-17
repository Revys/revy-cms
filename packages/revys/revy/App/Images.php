<?php

namespace Revys\Revy\App;

use Illuminate\Support\Collection;

class Images extends Collection
{
    /**
     * Sets image and remove other
     *
     * @param Image $image
     * @return Images
     */
    public function set(Image $image)
    {
        return $this->clear()->push($image);
    }

    public function clear()
    {
        return $this->each(function ($item, $key) {
            $this->forget($key);
        });
    }
}