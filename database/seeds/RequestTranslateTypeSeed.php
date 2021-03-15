<?php

use Illuminate\Database\Seeder;

class RequestTranslateTypeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('request_translate_type')->delete();
        DB::table('request_translate_type')->insert([
            [
                "name" => "音声字幕"
            ], [
                "name" => "テロップ字幕"
            ], [
                "name" => "音声+テロップ"
            ],
        ]);
    }
}
