<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
// use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromQuery
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $email;
    public function __construct($email)
    {
        $this->email = $email;
    }
    public function query()
    {
        return User::query()->where('email', $this->email);
    }
}
