<?php

// database/migrations/xxxx_xx_xx_create_hero_settings_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeroSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('hero_settings', function (Blueprint $table) {
            $table->id();
            $table->string('background_image')->nullable();
            $table->string('title')->nullable();
            $table->text('subtitle')->nullable();
            $table->string('button_text')->nullable();
            $table->string('button_url')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hero_settings');
    }
}
