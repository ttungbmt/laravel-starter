<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateGeoFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // artisan migrate:rollback --path=database/migrations/2020_04_19_141116_create_geo_files_table.php

        Schema::create('geo_files_manager', function (Blueprint $table) {
            $table->id();
            $table->nestedSet();
            $table->tinyInteger('type')->nullable();
            $table->string('name')->nullable();
            $table->uuid('uuid')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->timestamps();
        });

        Schema::create('geo_drives', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('manager_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name')->nullable();
            $table->unsignedBigInteger('used')->nullable();
            $table->unsignedBigInteger('storage')->nullable();
            $table->timestamps();

            $table->foreign('manager_id')
                ->references('id')
                ->on('geo_files_manager')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });

        Schema::create('geo_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('manager_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('file_name')->nullable();
            $table->string('mime_type')->nullable();
            $table->unsignedBigInteger('size')->nullable();

            $table->foreign('manager_id')
                ->references('id')
                ->on('geo_files_manager')
                ->onDelete('cascade');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('geo_files');
        Schema::dropIfExists('geo_drives');
        Schema::dropIfExists('geo_files_manager');
    }
}
