<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{

    public function run()
    {
        $user = new User;
        $user->avatar = 'uploads/avatars/default.png';
        $user->name = 'Ahmed Ahmed';
        $user->email = 'ahmed@gmail.com';
        $user->password = bcrypt('123456');
        $user->phone = '01069217092';
        $user->address = 'BaneSuef Abdelsalam Aref';
        $user->save();


    }
}
