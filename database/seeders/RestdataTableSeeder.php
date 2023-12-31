<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Restdata;

class RestdataTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $param = [
          'message' => 'Google Japan',
          'url' => 'https://www.google.co.jp',
        ];
        $restdata = new Restdata;
        $restdata -> fill($param) -> save();
        
        $param = [
          'message' => 'MSN Japan',
          'url' => 'https://www.msn.com/ja-jp',
        ];

        $restdata = new Restdata;
        $restdata -> fill($param) -> save();
    }
}
