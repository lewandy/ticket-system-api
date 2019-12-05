<?php

use App\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            "name" => "Admin",
            "last_name" => "Employee",
            "email" => "admin@gmail.com",
            "password" =>  Hash::make("12345"),
            "status" => true
        ]);
    }
}
