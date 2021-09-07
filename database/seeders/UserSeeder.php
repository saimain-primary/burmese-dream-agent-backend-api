<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $agent_id = IdGenerator::generate(['table' => 'users', 'field' => 'agent_id', 'length' => 7, 'prefix' => 'BD-']);

        User::create([
            'name' => 'Mg Mg',
            'agent_id' => $agent_id,
            'email' => 'mgmg@gmail.com',
            'phone' => '09979857473',
            'date_of_birth' => '3-8-2000',
            'address' => 'Kyaukme',
            'refer_code' => $this->generateUniqueCode(),
            'facebook' => 'https://facebook.com/saimain.dev',
            'password' => Hash::make('admin123'),
        ]);
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000, 99999);
        } while (User::where("refer_code", "=", $code)->first());

        return $code;
    }
}
