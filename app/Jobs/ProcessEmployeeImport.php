<?php

namespace App\Jobs;

use App\Imports\EmployeesImport;
use App\Models\ImportStatus;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessEmployeeImport implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    public function handle()
    {
        // Create a new import status record
        $importStatus = ImportStatus::create([
            'progress' => 0,
            'status' => 'in_progress',
        ]);

        // Perform the import
        Excel::import(new EmployeesImport, storage_path('app/' . $this->filePath));

        // Update import status once complete
        $importStatus->update(['progress' => 100, 'status' => 'completed']);
    }
}
