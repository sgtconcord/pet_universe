<?php

namespace Database\Seeders;

use App\Helper\CustomHelper;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
        'username' => 'superadmin',
        'full_name' => 'Super Admin',
        'email' => 'admin@rast.com',
        'phone' => '01797325129',
        'password' => bcrypt('12345600'),
        'status' => User::$statusArrays[1]
      ]);

      $customer = User::create([
        'username' => 'customer',
        'full_name' => 'Customer',
        'email' => 'customer@rast.com',
        'phone' => '01797325120',
        'password' => bcrypt('12345600'),
        'status' => User::$statusArrays[1]
      ]);
      $user->assignRole('Super Admin');
      $customer->assignRole('Customer');
      $faker = Factory::create();
      for ($i=1;$i<=10; $i++){
        $user = User::create([
          'username' => ucfirst($faker->firstName),
          'full_name' => ucfirst($faker->firstName).' '.ucfirst($faker->lastName),
          'email' => $faker->safeEmail,
          'phone' => '017'.CustomHelper::fillLeft($i,8),
          'password' => bcrypt('12345600'),
        ]);
        $user->assignRole('Admin');
      }
    }
}
