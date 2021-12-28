<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Mostafaznv\Larupload\LaruploadEnum;

class CreateFfmpegQueueTable extends Migration
{
    public function up()
    {
        return;
        Schema::create(LaruploadEnum::FFMPEG_QUEUE_TABLE, function(Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('record_id');
            $table->string('record_class', 50);
            $table->boolean('status')->default(0);
            $table->text('message')->nullable();

            $table->timestamp('created_at')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('finished_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists(LaruploadEnum::FFMPEG_QUEUE_TABLE);
    }
}
