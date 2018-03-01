<?php

namespace Revys\Revy\Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
use Revys\Revy\App\Image;
use Revys\Revy\App\Images;
use Revys\Revy\Tests\TestCase;
use Revys\Revy\Tests\TestEntity;

class WithImagesTraitTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @return TestEntity
     */
    public static function getObject()
    {
        $object = new TestEntity();

        $object->id = 1;

        return $object;
    }

    /** @test */
    public function images_collection_can_be_obtained()
    {
        $object = self::getObject();

        $this->assertInstanceOf(Images::class, $object->images());
    }

    /** @test */
    public function images_collection_can_be_obtained_with_rigth_images()
    {
        Storage::fake('public');

        $object = self::getObject();

        $image = ImagesTest::createImage();

        $object->images()->add($image);

        $this->assertEquals(1, $object->images()->count());

        $this->assertInstanceOf(Image::class, $object->images()->first());
    }

    /** @test */
    public function image_types_can_be_obtained()
    {
        $object = self::getObject();

        $this->assertTrue(is_array($object->getImageTypes()));
    }

    /** @test */
    public function image_type_can_be_obtained()
    {
        $object = self::getObject();

        $this->assertInstanceOf(\Closure::class, $object->getImageType('original'));
        $this->assertFalse($object->getImageType('not_exist'));
    }
}
