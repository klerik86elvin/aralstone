<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftDeleteAllModels extends Migration
{
    private $tables = [
        'users', 'admins', 'products', 'categories', 'content', 'content_types', 'orders'
    ];
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->tables as $name):
            Schema::table($name, function (Blueprint $table)
            {
               $table->softDeletes();
            });
        endforeach;
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
