<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMicropostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microposts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index(); // unsigned()は、負の数は許可しない
            $table->string('content');
            $table->timestamps();

            // 外部キー制約
            // $table->foreign(外部キーを設定するカラム名)->references(制約先のID名)->on(外部キー制約先のテーブル名);
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('microposts');
    }
}
