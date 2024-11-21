<?php

namespace Database\Seeders;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Department::create([
            'dep_id' => '001',
            'dep_name' => 'Human Resources',
            'designation' => 'HR Manager',
            'no_of_employees' => 10,
        ]);

        Department::create([
            'dep_id' => '002',
            'dep_name' => 'Development',
            'designation' => 'Software Engineer',
            'no_of_employees' => 15,
        ]);

        // Add more departments as needed
  
    }
}
