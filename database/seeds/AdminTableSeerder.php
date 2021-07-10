<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->name = "Resturant Admin";
        $admin->email = "resturant@gmail.com";
        $admin->phone = "01010101010";
        $admin->address = "Abdelsalam Aref Street";
        $admin->type = 1;
        $admin->password = bcrypt('123456');
        $admin->save();
    }
}
