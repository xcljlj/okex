<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserOkexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_okex', function (Blueprint $table) {
            $table->increments('okexid')->comment('主键ID');
            $table->integer('uid')->comment('关联users表ID');
            $table->string('api_key',32)->comment('okex接口key');
            $table->string('secret_key',32)->comment('okex接口授权key');
            $table->timestamp('c_time')->comment('创建时间')->nullable();
            $table->timestamp('u_time')->comment('修改时间')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_okex');
    }
}
