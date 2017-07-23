<?php

use Revys\Revy\App\Entity;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdminMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable();
            $table->string('title');
            //$table->string('page')->default('index');
            //$table->boolean('is_default');
            $table->string('controller');
            $table->string('action');
            $table->string('icon')->nullable();
            $table->tinyInteger('status')->default(Entity::STATUS_PUBLISHED); 
            $table->timestamps();
        });

        Schema::table('admin_menu', function($table) {
            $table->foreign('parent_id')->references('id')->on('admin_menu');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_menu');
    }
}
