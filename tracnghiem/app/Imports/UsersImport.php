<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $pass=str_random(10);
        return new User([
            "name"=>$row[0],
            "username"=>$row[1],
            "email"=>$row[2],
            "DoB"=>$row[3],
            "password"=>bcrypt($pass),
            "password1"=>$pass,
            "idExam"=>$row[4],
            "code"=>$row[5]
        ]);
    }
}
