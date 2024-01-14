<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class BackupController extends Controller
{
    public function index()
    {
         return view('backup.index');
    }

    public function backupManual()
    {
        // Execute the artisan command to backup the database
        Artisan::call('database:manual-backup');

        // Redirect back or to any other route
        return redirect()->back()->with('success', 'Database backup completed successfully.');
    }
}
