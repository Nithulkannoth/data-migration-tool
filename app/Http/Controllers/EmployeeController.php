<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessEmployeeImport;
use App\Models\ImportStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    // Show the file upload form
    public function showUploadForm()
    {
        return view('employees.upload');
    }

    // Handle file upload and dispatch the import job
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // Store the uploaded file
        $filePath = $request->file('file')->store('temp');

        // Dispatch the import job
        ProcessEmployeeImport::dispatch($filePath);

        return response()->json(['message' => 'File uploaded and import started.']);
    }

    // Return the progress of the import
    public function progress()
    {
        $importStatus = ImportStatus::latest()->first();
        return response()->json([
            'progress' => $importStatus ? $importStatus->progress : 0
        ]);
    }
}
