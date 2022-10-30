<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        ################ Orders ###################
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign("user_id")
            ->references('id')
            ->on("users")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
        Schema::table('orders', function (Blueprint $table) {
            $table->foreign("plan_id")
            ->references('id')
            ->on("plans")
            ->onDelete("cascade")
            ->onUpdate("cascade");
        });
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
};
