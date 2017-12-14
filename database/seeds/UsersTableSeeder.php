<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = new User();
      $user -> name = "Stratti";
      $user -> email = "m.strathausen@gmail.com";
      $user -> password = Hash::make('test');
      $user -> share_id = uniqid();
      $user -> save();
    }
}
