<?php

namespace Revys\Revy\Tests\Unit;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Exception\NotFoundException;
use Revys\Revy\App\Image;
use Revys\Revy\Tests\TestCase;
use Revys\Revy\Tests\TestEntity;

class WithImagesTraitTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @param string $name
     * @return Image
     */
    public static function createImage($name = 'image.jpg')
    {
        return Image::new(function () use ($name) {
            return \Image::make(
                UploadedFile::fake()->image($name)
            );
        });
    }

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

        $this->assertInstanceOf(Relation::class, $object->images());
    }

    /** @test */
    public function images_collection_can_be_obtained_with_rigth_images()
    {
        $object = self::getObject();

        $image = self::createImage();

        $object->addImage($image);

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

    /** @test
     * @throws \Exception
     */
    public function test_addImage()
    {
        Storage::fake('public');

        $object = self::getObject();

        $image = self::createImage();

        $object->addImage($image);

        $this->assertFileExists($image->getPath());

        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model'     => $object->getModelName(),
            'filename'  => $image->getInstance()->basename
        ]);
    }

    /** @test
     * @throws \Exception
     */
    public function test_setImage()
    {
        Storage::fake('public');

        $object = self::getObject();

        $image = self::createImage();
        $image2 = self::createImage();

        $object->addImage($image);
        $object->setImage($image2);

        $this->assertFileNotExists($image->getPath());

        $this->assertDatabaseMissing('images', [
            'object_id' => $object->id,
            'model'     => $object->getModelName(),
            'filename'  => $image->getInstance()->basename
        ]);

        $this->assertFileExists($image2->getPath());

        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model'     => $object->getModelName(),
            'filename'  => $image2->getInstance()->basename
        ]);
    }

    /** @test
     * @throws \Exception
     */
    public function test_addImages()
    {
        Storage::fake('public');

        $object = self::getObject();

        $image = self::createImage();
        $image2 = self::createImage();

        $object->addImages([
            $image,
            $image2
        ]);

        $this->assertFileExists($image->getPath());

        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model'     => $object->getModelName(),
            'filename'  => $image->getInstance()->basename
        ]);

        $this->assertFileExists($image2->getPath());

        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model'     => $object->getModelName(),
            'filename'  => $image2->getInstance()->basename
        ]);
    }


    /**
     * @test
     * @throws \Exception
     */
    public function test_removeImage_with_Image_object()
    {
        Storage::fake('public');

        $object = self::getObject();

        $image = self::createImage();

        $object->addImage($image);

        $this->assertFileExists($image->getPath());

        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model'     => $object->getModelName(),
            'filename'  => $image->getInstance()->basename
        ]);

        $object->removeImage($image);

        $this->assertFileNotExists($image->getPath());

        $this->assertDatabaseMissing('images', [
            'object_id' => $object->id,
            'model'     => $object->getModelName(),
            'filename'  => $image->getInstance()->basename
        ]);
    }


    /**
     * @test
     * @throws \Exception
     */
    public function test_removeImage_with_image_name()
    {
        Storage::fake('public');

        $object = self::getObject();

        $image = self::createImage();

        $object->addImage($image);

        $this->assertFileExists($image->getPath());

        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model'     => $object->getModelName(),
            'filename'  => $image->getInstance()->basename
        ]);

        $object->removeImage($image->filename);

        $this->assertFileNotExists($image->getPath());

        $this->assertDatabaseMissing('images', [
            'object_id' => $object->id,
            'model'     => $object->getModelName(),
            'filename'  => $image->getInstance()->basename
        ]);

        $this->expectException(NotFoundException::class);

        $object->removeImage('doent-exist');
    }
}
