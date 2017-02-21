<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create58ac55eb8b096UserViewFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('user_view_field')) {
            Schema::create('user_view_field', function (Blueprint $table) {
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', 'fk_p_16601_16607_viewfield_user')->references('id')->on('users')->onDelete('cascade');
                $table->integer('view_field_id')->unsigned()->nullable();
                $table->foreign('view_field_id', 'fk_p_16607_16601_user_viewfield')->references('id')->on('view_fields')->onDelete('cascade');
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_view_field');
    }
}
