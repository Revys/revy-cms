<?php

namespace Revys\Revy\Tests\Unit;

use App\Service;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Revys\Revy\App\Images;
use Revys\Revy\Tests\TestCase;

class WithImagesTraitTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @todo Replace Service() with unrelated to production model
     */
    public static function getObject()
    {
        $object = new Service(); // WithImages trait

        $object->id = 1;

        return $object;
    }

    /** @test */
    public function images_collection_can_be_obtained()
    {
        $object = self::getObject(); // WithImages

        $this->assertInstanceOf(Images::class, $object->images());
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
        $object = self::getObject();

        $image = ImagesTest::createImage();

        $tmp = $image->instance->basePath();

        $this->assertFileExists($tmp);

        $object->addImage($image);

        @unlink($tmp);

        $this->assertFileExists($image->instance->basePath());
        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model' => $object->getModelName(),
            'filename' => $image->instance->basename
        ]);

        $object->removeImages();
    }

    /** @test
     * @throws \Exception
     */
    public function test_setImage()
    {
        $object = self::getObject();

        $image = ImagesTest::createImage();
        $image2 = ImagesTest::createImage('image2.jpg');

        $tmp = $image->instance->basePath();
        $tmp2 = $image2->instance->basePath();

        $this->assertFileExists($tmp);
        $this->assertFileExists($tmp2);

        $object->addImage($image2);
        $object->setImage($image);

        @unlink($tmp);
        @unlink($tmp2);

        $this->assertFileExists($image->instance->basePath());
        $this->assertFileNotExists($image2->instance->basePath());

        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model' => $object->getModelName(),
            'filename' => $image->instance->basename
        ]);
        $this->assertDatabaseMissing('images', [
            'object_id' => $object->id,
            'model' => $object->getModelName(),
            'filename' => $image2->instance->basename
        ]);

        $object->removeImages();
    }

    /** @test
     * @throws \Exception
     */
    public function test_addImages()
    {
        $object = self::getObject();

        $image = ImagesTest::createImage();
        $image2 = ImagesTest::createImage('image2.jpg');

        $tmp = $image->instance->basePath();
        $tmp2 = $image2->instance->basePath();

        $this->assertFileExists($tmp);
        $this->assertFileExists($tmp2);

        $object->addImages([
            $image, $image2
        ]);

        @unlink($tmp);
        @unlink($tmp2);

        $this->assertFileExists($image->instance->basePath());
        $this->assertFileExists($image2->instance->basePath());

        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model' => $object->getModelName(),
            'filename' => $image->instance->basename
        ]);
        $this->assertDatabaseHas('images', [
            'object_id' => $object->id,
            'model' => $object->getModelName(),
            'filename' => $image2->instance->basename
        ]);

        $object->removeImages();
    }
}
