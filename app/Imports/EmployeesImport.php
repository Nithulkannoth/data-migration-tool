<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmployeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Find or create the department and designation
        $department = Department::firstOrCreate(['name' => $row['department']]);
        $designation = Designation::firstOrCreate(['name' => $row['designation']]);

        // Create a new employee
        return new Employee([
            'name'          => $row['name'],
            'email'         => $row['email'],
            'phone'         => $row['phone'],
            'address'       => $row['address'],
            'department_id' => $department->id,
            'designation_id' => $designation->id,
        ]);
    }
}
