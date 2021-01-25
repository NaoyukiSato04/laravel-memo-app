<?php

use Illuminate\Database\Seeder;

use App\Memo;

class MemoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('memo')->delete(); //最初に全件削除

        Memo::create([
            'title' => 'memo01', 'content' => '仮データ1', 'name' => 'aaa', 'created_at' => now()
        ]);

        Memo::create([
            'title' => 'memo02', 'content' => '仮データ2', 'name' => 'aaa', 'created_at' => now()
        ]);
    }
}
