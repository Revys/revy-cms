<?php

namespace Revys\Revy\Tests\Unit;

use Illuminate\Http\UploadedFile;
use Revys\Revy\App\Image;
use Revys\Revy\App\Images;
use Revys\Revy\Tests\TestCase;

class ImagesTest extends TestCase
{
    /**
     * @param string $name
     * @return Image
     */
    public static function createImage($name = 'image.jpg')
    {
        return Image::new(function () use ($name) {
            $file = sys_get_temp_dir() . '/' . $name;
            return \Image::canvas(400, 300, '#ccc')->save($file);
        });
    }

    /** @test */
    public function image_can_be_set()
    {
        $images = new Images();

        $this->assertCount(0, $images);

        $image = self::createImage();

        $images->set($image);

        $this->assertCount(1, $images);

        $this->assertEquals($image, $images->first());

        unlink($image->instance->basePath());
    }
}
