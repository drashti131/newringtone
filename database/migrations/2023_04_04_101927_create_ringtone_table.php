php artisan migrate<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRingtoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ringtone', function (Blueprint $table) {
            $table->id('r_id');
            $table->string('name');
            $table->string('url');
            $table->string('time');
            $table->string('authorname');
            $table->string('download_count');
            $table->text('labels');
            $table->text('audio_file')->nullable();
            $table->text('iphone_audio_file')->nullable();
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
        Schema::dropIfExists('ringtone');
    }
}
