<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class Backup_Database_Pgsql extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:manual-backup-pgsql';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseName = "backup-manual-pgsql-";
        $suffix = 0;
        
        do {
            $filename = $baseName . '-' . Carbon::now()->format('Y-m-d_H-i-s') . '-' . $suffix . ".gz";
            $filePath = storage_path("/app/backup/" . $filename);
            $suffix++;
        } while (file_exists($filePath));
        
        // Replace 'C:\Program Files\PostgreSQL\13\bin\pg_dump' with the actual path to your pg_dump executable
        $command = '"C:\Program Files\PostgreSQL\15\bin\pg_dump" --username=' . env('DB_USERNAME') . ' --password=' . env('DB_PASSWORD') . ' --host=' . env('DB_HOST') . ' ' . env('DB_DATABASE') . ' | gzip > ' . $filePath;
        
        $returnVar = NULL;
        $output  = NULL;
        
        exec($command, $output, $returnVar);
        

    }
}
