<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserNotificationMail; // Make sure to import your Mailable class

class EmployeesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Find or create the department and designation
        $department = Department::firstOrCreate(['name' => $row['department']]);
        $designation = Designation::firstOrCreate(['name' => $row['designation']]);

        $employee = new Employee([
            'name'          => $row['name'],
            'email'         => $row['email'],
            'phone'         => $row['phone'],
            'address'       => $row['address'],
            'department_id' => $department->id,
            'designation_id' => $designation->id,
        ]);

        // $this->sendEmailNotification($employee);

        return $employee;
    }

    protected function sendEmailNotification($employee)
    {
        try {
            // Send the email
            Mail::to($employee->email)->send(new UserNotificationMail($employee));

            // Update the email status to 'received' if successful
            $employee->update(['email_status' => 'received']);
        } catch (\Exception $e) {
            // Update the email status to 'failed' if there is an error
            $employee->update(['email_status' => 'failed']);
        }
    }
}
