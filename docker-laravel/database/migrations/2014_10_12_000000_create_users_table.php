<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->smallInteger('status')->comment('ステータス');
            $table->string('name', 255)->comment('名称');
            $table->string('name_kana', 255)->comment('名称（カナ）');
            $table->smallInteger('gender')->comment('性別');
            $table->integer('birthdate')->comment('生年月日');
            $table->integer('zipcode')->comment('郵便番号');
            $table->string('address', 255)->comment('住所');
            $table->string('license', 255)->comment('保有資格');
            $table->string('url', 255)->comment('URL');
            $table->dateTime('created_at');
            $table->string('created_user', 255);
            $table->dateTime('updated_at');
            $table->string('updated_user', 255);
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
