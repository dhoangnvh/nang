<?php

use Illuminate\Database\Seeder;

class Languages extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->truncate();
        DB::table('languages')->insert([
            [
                "language" => "アフリカーンス語",
                "code" => "af",
                "code_gg" => "af",
            ], [
                "language" => "アゼルバイジャン語",
                "code" => "az",
                "code_gg" => "az",
            ], [
                "language" => "インドネシア語",
                "code" => "id",
                "code_gg" => "id",
            ], [
                "language" => "マレー語",
                "code" => "ms",
                "code_gg" => "ms",
            ], [
                "language" => "ボスニア語",
                "code" => "bs",
                "code_gg" => "bs",
            ], [
                "language" => "カタロニア語",
                "code" => "ca",
                "code_gg" => "ca",
            ], [
                "language" => "チェコ語",
                "code" => "cs",
                "code_gg" => "cs",
            ], [
                "language" => "デンマーク語",
                "code" => "da",
                "code_gg" => "da",
            ], [
                "language" => "ドイツ語",
                "code" => "de",
                "code_gg" => "de",
            ], [
                "language" => "エストニア語",
                "code" => "et",
                "code_gg" => "et",
            ], [
                "language" => "英語",
                "code" => "en",
                "code_gg" => "en",
            ], [
                "language" => "スペイン語",
                "code" => "es",
                "code_gg" => "es",
            ], [
                "language" => "スペイン語（ラテンアメリカ）",
                "code" => "es-419",
                "code_gg" => "es",
            ], [
                "language" => "スペイン語（米国）",
                "code" => "es-US",
                "code_gg" => "es",
            ], [
                "language" => "バスク語",
                "code" => "eu",
                "code_gg" => "eu",
            ], [
                "language" => "フィリピノ語",
                "code" => "fil  ",
                "code_gg" => "tl",
            ], [
                "language" => "フランス語",
                "code" => "fr",
                "code_gg" => "fr",
            ], [
                "language" => "ガリシア語",
                "code" => "gl",
                "code_gg" => "gl",
            ], [
                "language" => "クロアチア語",
                "code" => "hr",
                "code_gg" => "hr",
            ], [
                "language" => "ズールー語",
                "code" => "zu",
                "code_gg" => "zu",
            ], [
                "language" => "アイスランド語",
                "code" => "is",
                "code_gg" => "is",
            ], [
                "language" => "イタリア語",
                "code" => "it",
                "code_gg" => "it",
            ], [
                "language" => "スワヒリ語",
                "code" => "sw",
                "code_gg" => "sw",
            ], [
                "language" => "ラトビア語",
                "code" => "lv",
                "code_gg" => "lv",
            ], [
                "language" => "リトアニア語",
                "code" => "lt",
                "code_gg" => "lt",
            ], [
                "language" => "ハンガリー語",
                "code" => "hu",
                "code_gg" => "hu",
            ], [
                "language" => "オランダ語",
                "code" => "nl",
                "code_gg" => "nl",
            ], [
                "language" => "ノルウェイ語",
                "code" => "no",
                "code_gg" => "no",
            ], [
                "language" => "ウズベク語",
                "code" => "uz",
                "code_gg" => "uz",
            ], [
                "language" => "ポーランド語",
                "code" => "pl",
                "code_gg" => "pl",
            ], [
                "language" => "ポルトガル語（ブラジル）",
                "code" => "pt",
                "code_gg" => "pt",
            ], [
                "language" => "ルーマニア語",
                "code" => "ro",
                "code_gg" => "ro",
            ], [
                "language" => "アルバニア語",
                "code" => "sq",
                "code_gg" => "sq",
            ], [
                "language" => "スロバキア語",
                "code" => "sk",
                "code_gg" => "sk",
            ], [
                "language" => "スロベニア語",
                "code" => "sl",
                "code_gg" => "sl",
            ], [
                "language" => "フィンランド語",
                "code" => "fi",
                "code_gg" => "fi",
            ], [
                "language" => "スウェーデン語",
                "code" => "sv",
                "code_gg" => "sv",
            ], [
                "language" => "ベトナム語",
                "code" => "vi",
                "code_gg" => "vi",
            ], [
                "language" => "トルコ語",
                "code" => "tr",
                "code_gg" => "tr",
            ], [
                "language" => "ベラルーシ語",
                "code" => "be",
                "code_gg" => "be",
            ], [
                "language" => "ブルガリア語",
                "code" => "bg",
                "code_gg" => "bg",
            ], [
                "language" => "キルギス語",
                "code" => "ky",
                "code_gg" => "ky",
            ], [
                "language" => "カザフ語",
                "code" => "kk",
                "code_gg" => "kk",
            ], [
                "language" => "マケドニア語",
                "code" => "mk",
                "code_gg" => "mk",
            ], [
                "language" => "モンゴル語",
                "code" => "mn",
                "code_gg" => "mn",
            ], [
                "language" => "ロシア語",
                "code" => "ru",
                "code_gg" => "ru",
            ], [
                "language" => "セルビア語",
                "code" => "sr",
                "code_gg" => "sr",
            ], [
                "language" => "ウクライナ語",
                "code" => "uk",
                "code_gg" => "uk",
            ], [
                "language" => "ギリシャ語",
                "code" => "el",
                "code_gg" => "el",
            ], [
                "language" => "アルメニア語",
                "code" => "hy",
                "code_gg" => "hy",
            ], [
                "language" => "ヘブライ語",
                "code" => "iw",
                "code_gg" => "iw",
            ], [
                "language" => "ウルドゥー語",
                "code" => "ur",
                "code_gg" => "ur",
            ], [
                "language" => "アラビア語",
                "code" => "ar",
                "code_gg" => "ar",
            ], [
                "language" => "ペルシア語",
                "code" => "fa",
                "code_gg" => "fa",
            ], [
                "language" => "ネパール語",
                "code" => "ne",
                "code_gg" => "ne",
            ], [
                "language" => "マラーティー語",
                "code" => "mr",
                "code_gg" => "mr",
            ], [
                "language" => "インド語（ヒンドゥー語）",
                "code" => "hi",
                "code_gg" => "hi",
            ], [
                "language" => "アッサム語",
                "code" => "as",
                "code_gg" => "",
            ], [
                "language" => "ベンガル語",
                "code" => "bn",
                "code_gg" => "",
            ], [
                "language" => "パンジャブ語",
                "code" => "pa",
                "code_gg" => "pa",
            ], [
                "language" => "グジャラート語",
                "code" => "gu",
                "code_gg" => "gu",
            ], [
                "language" => "オディア語",
                "code" => "or",
                "code_gg" => "or",
            ], [
                "language" => "タミル語",
                "code" => "ta",
                "code_gg" => "ta",
            ], [
                "language" => "テルグ語",
                "code" => "te",
                "code_gg" => "te",
            ], [
                "language" => "カンナダ語",
                "code" => "kn",
                "code_gg" => "kn",
            ], [
                "language" => "マラヤーラム語",
                "code" => "ml",
                "code_gg" => "ml",
            ], [
                "language" => "シンハラ語",
                "code" => "si",
                "code_gg" => "si",
            ], [
                "language" => "タイ語",
                "code" => "th",
                "code_gg" => "th",
            ], [
                "language" => "ラオ語",
                "code" => "lo",
                "code_gg" => "lo",
            ], [
                "language" => "ミャンマー（ビルマ）語",
                "code" => "my",
                "code_gg" => "my",
            ], [
                "language" => "ジョージア語",
                "code" => "ka",
                "code_gg" => "ka",
            ], [
                "language" => "アムハラ語",
                "code" => "am",
                "code_gg" => "am",
            ], [
                "language" => "クメール語",
                "code" => "km",
                "code_gg" => "km",
            ], [
                "language" => "中国語",
                "code" => "zh",
                "code_gg" => "zh-CN",
            ], [
                "language" => "日本語",
                "code" => "ja",
                "code_gg" => "ja",
            ], [
                "language" => "韓国語",
                "code" => "ko",
                "code_gg" => "ko",
            ],
        ]);
    }
}
