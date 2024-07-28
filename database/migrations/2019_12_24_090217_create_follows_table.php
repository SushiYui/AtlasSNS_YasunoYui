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
            $table->id();
            // カスケードは一方のレコードが変更または削除されたとき、それに関連する他方のテーブルのレコードも変更、削除される
            $table->foreignId('following_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('followed_id')->constrained('users')->onDelete('cascade');
            // タイムスタンプを使うことでいつ更新されたかを確認できるためデータの整合性を保つことが出来る
            $table->timestamps();
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
