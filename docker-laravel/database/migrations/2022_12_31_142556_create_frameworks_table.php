<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrameworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frameworks', function (Blueprint $table) {
            $table->id();
            $table->integer('program_id')->comment('言語ID');
            $table->smallInteger('status')->comment('ステータス');
            $table->string('name', 255)->comment('名前');
            $table->string('icon', 255)->comment('アイコン');
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
        Schema::dropIfExists('frameworks');
    }
}
