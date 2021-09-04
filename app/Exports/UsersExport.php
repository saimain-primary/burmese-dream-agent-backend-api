<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings, WithMapping, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::all();
    }

    public function map($user): array
    {
        return [
            $user->id,
            $user->name,
            $user->agent_id,
            $user->email,
            $user->phone,
            $user->date_of_birth,
            $user->address,
            $user->points,
            $user->level,
            $user->refer_code,
            $user->invited_by,
        ];
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Agent ID',
            'Email',
            'Phone',
            'Date of Birth',
            'Address',
            'Points',
            'Level',
            'Refer Code',
            'Invited By User ID',
        ];
    }
}
