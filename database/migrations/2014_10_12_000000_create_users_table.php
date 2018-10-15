<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('uid')->comment('主键ID');
            $table->string('mobile',15)->comment('手机号码');
            $table->string('username',25)->comment('用户名');
            $table->string('password',32)->comment('用户密码');
            $table->integer('sex')->comment('性别:0-保密|1-男|2-女|')->default(0);
            $table->rememberToken();
            $table->integer('platform')->comment('操作平台')->defaule();
            $table->integer('is_valid')->comment('是否有效');
            $table->timestamp('login_time')->comment('登录时间')->nullable();
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
        Schema::dropIfExists('users');
    }
}
