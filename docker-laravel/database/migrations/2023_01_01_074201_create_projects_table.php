<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('status')->comment('ステータス');
            $table->string('name', 255)->comment('プロジェクト名');
            $table->integer('os_id')->comment('サーバーOS');
            $table->json('program_ids')->comment('言語ID');
            $table->json('fw_ids')->comment('フレームワークID');
            $table->json('db_ids')->comment('データベースID');
            $table->integer('job_id')->comment('役割');
            $table->json('responsible_ids')->comment('担当工程');
            $table->date('period_from')->comment('参画期間(From)');
            $table->date('period_to')->comment('参画期間(To)');
            $table->longText('info')->comment('詳細情報');
            $table->longText('lean')->comment('学んだこと');
            $table->integer('work_type')->comment('業務種別');
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
        Schema::dropIfExists('projects');
    }
}
