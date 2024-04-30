<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['username' => 'ちいかわ',
            'mail' => 'tiikawa@nagano.com',
            'password' => Hash::make('tiikawa1')],
            ['username' => 'ハチワレ',
            'mail' => 'hatiware@nagano.com',
            'password' => Hash::make('hatiware2')],
            ['username' => 'うさぎ',
            'mail' => 'usagi@nagano.com',
            'password' => Hash::make('usagi333')],
            ['username' => '鎧さん',
            'mail' => 'yoroisan@pajama.partys',
            'password' => Hash::make('yoroisan4')],
            ['username' => 'モモンガ',
            'mail' => 'momonga@pajama.partys',
            'password' =>Hash::make('momonga5')],
        ]);
        // bcrypt()メソッドはパスワードを暗号化する
    }
}
