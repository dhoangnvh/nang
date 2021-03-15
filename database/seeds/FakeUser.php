<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Classes\UserRoleIdEnum;

class FakeUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => '翻訳依頼者',
                'email' => 'request@gmail.com',
                'password' => Hash::make(12345678),
                'login' => 'request',
                'is_superuser' => 0,
                'role_id' => UserRoleIdEnum::REQUEST,
                'number_channel' => 1,
            ], [
                'name' => '翻訳者',
                'email' => 'translate@gmail.com',
                'password' => Hash::make(12345678),
                'login' => 'translate',
                'is_superuser' => 0,
                'role_id' => UserRoleIdEnum::TRANSLATER,
                'number_channel' => 1,
            ], [
                'name' => 'vunv',
                'email' => 'vunv@gmail.com',
                'password' => Hash::make(12345678),
                'login' => 'vunv',
                'is_superuser' => 0,
                'role_id' => UserRoleIdEnum::ADMIN,
                'number_channel' => 1,
            ], [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make(12345678),
                'login' => 'user',
                'is_superuser' => 0,
                'role_id' => UserRoleIdEnum::USER,
                'number_channel' => 1,
            ], [
                'name' => 'translation management',
                'email' => 'translation_management@gmail.com',
                'password' => Hash::make(12345678),
                'login' => 'business',
                'is_superuser' => 0,
                'role_id' => UserRoleIdEnum::BUSINESS,
                'number_channel' => 1,
            ],
        ]);
    }
}
