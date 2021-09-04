<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $agent_id = IdGenerator::generate(['table' => 'users', 'field' => 'agent_id', 'length' => 7, 'prefix' => 'BD-']);

        return new User([
            'name' => $row['name'],
            'agent_id' => $agent_id,
            'email' => $row['email'],
            'phone' => $row['phone'],
            'password' => Hash::make($row['phone']),
            'date_of_birth' => $row['date_of_birth'],
            'address' => $row['address'],
            'points' => $row['points'],
            'level' => $row['level'],
            'refer_code' => $this->generateUniqueCode(),
            'invited_by' => $row['invited_by_user_id'],
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
