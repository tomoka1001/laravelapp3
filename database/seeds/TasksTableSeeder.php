<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // range(start開始数, stop[, step]終了数(指定した数値を超えない範囲))
        foreach (range(1, 3) as $num) {
            // tasksテーブルにinsert
            DB::table('tasks')->insert([
                'folder_id' => 1,
                'title' => "サンプルタスク {$num}",
                'status' => $num,
                // addDayメソッドを利用してそれぞれ現在時間から1〜3日加算した日付を指定
                'due_date' => Carbon::now()->addDay($num),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
