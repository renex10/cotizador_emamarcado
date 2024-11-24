<?php
// database/migrations/xxxx_xx_xx_create_modal_settings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modal_settings', function (Blueprint $table) {
            $table->id();
            $table->boolean('modal_active')->default(false);
            $table->string('title')->nullable();
            $table->text('content')->nullable();
            $table->string('image_path')->nullable();  // Asegúrate de que esta línea esté presente
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modal_settings');
    }
}
