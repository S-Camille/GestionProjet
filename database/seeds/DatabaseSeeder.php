<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            "id" => "9a29bf6e-c99a-4a64-9a5d-1ea7552dc7fa",
            "firstname" => "admin",
            "lastname" => "admin",
            "telephone" => "0000000000",
            "email" => "admin@admin.fr",
            "presentation" => "admin",
            "password" => "admin",
        ]);
    }
}
