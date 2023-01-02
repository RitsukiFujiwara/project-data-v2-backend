<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('programs');
    }
}
