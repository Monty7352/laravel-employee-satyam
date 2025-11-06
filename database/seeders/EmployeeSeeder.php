<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Department;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        // अगर departments मौजूद नहीं हैं, तो पहले DepartmentSeeder चलाओ
        if (Department::count() === 0) {
            $this->call(DepartmentSeeder::class);
        }

        $departments = Department::all();

        $employees = [
            ['name' => 'Aman Verma', 'email' => 'aman@example.com', 'salary' => 45000],
            ['name' => 'Priya Singh', 'email' => 'priya@example.com', 'salary' => 50000],
            ['name' => 'Rohit Kumar', 'email' => 'rohit@example.com', 'salary' => 47000],
            ['name' => 'Neha Sharma', 'email' => 'neha@example.com', 'salary' => 52000],
            ['name' => 'Vikram Patel', 'email' => 'vikram@example.com', 'salary' => 48000],
        ];

        foreach ($employees as $index => $data) {
            // हर employee को random department assign करो
            $department = $departments->random();
            Employee::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'department_id' => $department->id,
                'salary' => $data['salary'],
            ]);
        }
    }
}
