<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // https://so-zou.jp/web-app/tech/web-api/google/youtube/category.htm
        DB::table('category')->truncate();
        DB::table('category')->insert([
            ["category_name" => "科学と技術","parent_id" => null,"status" => 0],
            ["category_name" => "旅行とイベント","parent_id" => null,"status" => 0],
            ["category_name" => "ブログ","parent_id" => null,"status" => 0],
            ["category_name" => "ハウツーとスタイル","parent_id" => null,"status" => 0],
            ["category_name" => "ニュースと政治","parent_id" => null,"status" => 0],
            ["category_name" => "コメディー","parent_id" => null,"status" => 0],
            ["category_name" => "音楽","parent_id" => null,"status" => 0],
            ["category_name" => "映画とアニメ","parent_id" => null,"status" => 0],
            ["category_name" => "自動車と乗り物","parent_id" => null,"status" => 0],
            ["category_name" => "スポーツ","parent_id" => null,"status" => 0],
            ["category_name" => "ゲーム","parent_id" => null,"status" => 0],
            ["category_name" => "エンターテイメント","parent_id" => null,"status" => 0],
            ["category_name" => "ペットと動物","parent_id" => null,"status" => 0],
            ["category_name" => "教育","parent_id" => null,"status" => 0],
            // ["category_name" => "Nonprofits & Activism","parent_id" => null,"status" => 0],

            ["category_name" => "Technology","parent_id" => "1","status" => null],
            ["category_name" => "Television_program","parent_id" => "1","status" => null],

            ["category_name" => "Tourism","parent_id" => "2","status" => null],

            ["category_name" => "Food","parent_id" => "3","status" => null],
            ["category_name" => "Health","parent_id" => "3","status" => null],

            ["category_name" => "Fashion","parent_id" => "4","status" => null],
            ["category_name" => "Hobby","parent_id" => "4","status" => null],

            ["category_name" => "Religion","parent_id" => "5","status" => null],
            ["category_name" => "Politics","parent_id" => "5","status" => null],
            ["category_name" => "Knowledge","parent_id" => "5","status" => null],
            ["category_name" => "Military","parent_id" => "5","status" => null],

            ["category_name" => "Humour","parent_id" => "6","status" => null],

            ["category_name" => "Classical_music","parent_id" => "7","status" => null],
            ["category_name" => "Country_music","parent_id" => "7","status" => null],
            ["category_name" => "Electronic_music","parent_id" => "7","status" => null],
            ["category_name" => "Hip_hop_music","parent_id" => "7","status" => null],
            ["category_name" => "Independent_music","parent_id" => "7","status" => null],
            ["category_name" => "Music","parent_id" => "7","status" => null],
            ["category_name" => "Music_of_Asia","parent_id" => "7","status" => null],
            ["category_name" => "Music_of_Latin_America","parent_id" => "7","status" => null],
            ["category_name" => "Music_video_game","parent_id" => "7","status" => null],
            ["category_name" => "Rhythm_and_blues","parent_id" => "7","status" => null],
            ["category_name" => "Rock_music","parent_id" => "7","status" => null],
            ["category_name" => "Soul_music","parent_id" => "7","status" => null],
            ["category_name" => "Pop_music","parent_id" => "7","status" => null],
            ["category_name" => "Jazz","parent_id" => "7","status" => null],

            ["category_name" => "Film","parent_id" => "8","status" => null],

            ["category_name" => "Vehicle","parent_id" => "9","status" => null],

            ["category_name" => "Association_football","parent_id" => "10","status" => null],
            ["category_name" => "Baseball","parent_id" => "10","status" => null],
            ["category_name" => "Basketball","parent_id" => "10","status" => null],
            ["category_name" => "Boxing","parent_id" => "10","status" => null],
            ["category_name" => "Golf","parent_id" => "10","status" => null],
            ["category_name" => "Motorsport","parent_id" => "10","status" => null],
            ["category_name" => "Volleyball","parent_id" => "10","status" => null],
            ["category_name" => "Sport","parent_id" => "10","status" => null],
            ["category_name" => "Sports_game","parent_id" => "10","status" => null],
            ["category_name" => "Tennis","parent_id" => "10","status" => null],
            ["category_name" => "Professional_wrestling","parent_id" => "10","status" => null],
            ["category_name" => "Physical_fitness","parent_id" => "10","status" => null],

            ["category_name" => "Action_game","parent_id" => "11","status" => null],
            ["category_name" => "Action-adventure_game","parent_id" => "11","status" => null],
            ["category_name" => "Casual_game","parent_id" => "11","status" => null],
            ["category_name" => "Puzzle_video_game","parent_id" => "11","status" => null],
            ["category_name" => "Racing_video_game","parent_id" => "11","status" => null],
            ["category_name" => "Strategy_video_game","parent_id" => "11","status" => null],
            ["category_name" => "Video_game_culture","parent_id" => "11","status" => null],
            ["category_name" => "Sports_game","parent_id" => "11","status" => null],
            ["category_name" => "Role-playing_video_game","parent_id" => "11","status" => null],
            ["category_name" => "Simulation_video_game","parent_id" => "11","status" => null],

            ["category_name" => "Performing_arts","parent_id" => "12","status" => null],
            ["category_name" => "Mixed_martial_arts","parent_id" => "12","status" => null],
            ["category_name" => "Entertainment","parent_id" => "12","status" => null],

            ["category_name" => "Pet","parent_id" => "13","status" => null],

            ["category_name" => "Lifestyle_(sociology)","parent_id" => "14","status" => null],
            ["category_name" => "Society","parent_id" => "14","status" => null],

            ["category_name" => "Reggae","parent_id" => "7","status" => null],
        ]);
    }
}
