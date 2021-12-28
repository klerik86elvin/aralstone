<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFooterUrl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('social_networks', function (Blueprint $table) {
            $table->string('name')->after('id')->nullable();
            $table->string('footer_icon')->after('icon')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('social_networks', function (Blueprint $table) {
            $table->dropIfExists('name');
            $table->dropIfExists('footer_icon');
        });
    }
}
