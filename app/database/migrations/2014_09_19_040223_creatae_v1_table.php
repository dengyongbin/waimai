<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreataeV1Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('member_users', function($table){
            $table->bigIncrements('id');
            $table->string('email', 20);
            $table->string('password', 50);
            $table->string('name', 20);
            $table->string('mobile', 20);
            $table->string('address', 200);
            // timestamp fields
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('goods', function($table){
            $table->bigIncrements('id');
            $table->string('name', 20);
            $table->bigInteger('sort');
            $table->integer('category_id')->unsigned();
            $table->double('price', 5, 2);
            $table->double('packing_price', 5, 2);
            $table->bigInteger('daily_number')->nullable();
            $table->string('thumbnail', 200)->nullable();
            $table->string('description', 200)->nullable();
            // timestamp fields
            $table->timestamps();
            $table->softDeletes();
            // $table->primary('id');
        });

        Schema::create('orders', function($table){
            $table->bigIncrements('id');
            $table->string('order_no', 20);
            $table->tinyInteger('status');
            $table->dateTime('delivery_time');
            $table->string('telphone', 20);
            $table->string('address', 200);
            $table->string('contacts', 50);
            $table->string('remark', 200)->nullable();
            $table->string('ip', 20)->nullable();
            $table->bigInteger('good_orders_id');
            // timestamp fields
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('good_orders', function($table){
            $table->bigIncrements('id');
            $table->bigInteger('good_id');
            $table->bigInteger('order_id');
            $table->bigInteger('number');
            $table->double('price', 5, 2);
            $table->double('total_price', 5, 2);
            // timestamp fields
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('good_categorys', function($table){
            $table->increments('id');
            $table->string('name', 50);
            $table->bigInteger('sort');
            // timestamp fields
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('menus', function($table) {
            $table->integer('id');
            $table->integer('parent')->default(0);
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('url');
            $table->string('view')->nullable();
            $table->string('icon')->nullable();

            $table->primary('id');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('member_users');
        Schema::dropIfExists('member_users');
        Schema::dropIfExists('goods');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('good_orders');
        Schema::dropIfExists('good_categorys');
        Schema::dropIfExists('menus');
	}

}
