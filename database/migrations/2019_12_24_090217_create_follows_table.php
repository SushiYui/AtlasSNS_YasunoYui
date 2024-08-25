<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // followという名前のテーブルを作成する宣言
        Schema::create('follows', function (Blueprint $table) {
            // 作成したレコードにidを割り振っている
            // $table->integer('id')->autoIncrement();
            // // カスケードは一方のレコードが変更または削除されたとき、それに関連する他方のテーブルのレコードも変更、削除される
            // $table->foreignId('following_id')->constrained('users')->onDelete('cascade');
            // $table->foreignId('followed_id')->constrained('users')->onDelete('cascade');
            // // タイムスタンプを使うことでいつ更新されたかを確認できるためデータの整合性を保つことが出来る
            // $table->timestamps();

            $table->integer('id')->autoIncrement();
            $table->integer('following_id');
            $table->integer('followed_id');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
