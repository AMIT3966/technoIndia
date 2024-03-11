<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('parent_id')->comment('0: level 1');
            $table->string('title');
            $table->string('slug');
            $table->text('short_desc')->nullable();
            $table->longText('long_desc')->nullable();

            $table->string('icon_path_small')->nullable();
            $table->string('icon_path_medium')->nullable();
            $table->string('icon_path_large')->nullable();

            $table->string('banner_image_path_small')->nullable();
            $table->string('banner_image_path_medium')->nullable();
            $table->string('banner_image_path_large')->nullable();

            $table->tinyInt('status')->default(1);

            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
