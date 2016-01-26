<?php

use Illuminate\Database\Seeder;
use App\Model\Admin\GroupUser;
use App\Model\Admin\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        // seed group_user
        foreach (range(1, 6) as $index) {
            GroupUser::create([
                'group_name' => $faker->safeColorName,
                'sort_order' => $index,
                'status' => rand(0, 1)
            ]);
        }

        // seed user
        $group_user = GroupUser::all();
        foreach (range(0, 20) as $index) {
            User::create([
                'group_id' => $group_user->shuffle()->first()->id,
                'username' => 'test' . $index . '@col.com',
                'password' => Hash::make('1234'),
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'position' => $faker->companySuffix,
                'department' => $faker->company,
                'status' => rand(0, 1)
            ]);
        }
    }
}
