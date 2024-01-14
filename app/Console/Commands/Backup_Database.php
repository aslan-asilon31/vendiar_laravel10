<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;


class Backup_Database extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // protected $signature = 'app:backup_-database';
    protected $signature = 'database:manual-backup';


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
        // $filename = "backup-manual " . Carbon::now() . ".gz";
        // $changeSuffix = 1;


        // $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/backup/" . $filename."-". Carbon::now();
  
        $baseName = "backup-manual";
        $suffix = 0;

        do {
            $filename = $baseName . '-' . Carbon::now()->format('Y-m-d_H-i-s') . '-' . $suffix . ".gz";
            $filePath = storage_path("/app/backup/" . $filename);
            $suffix++;
        } while (file_exists($filePath));

        $command = "mysqldump --user=" . env('DB_USERNAME') . " --password=" . env('DB_PASSWORD') . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . $filePath;

        $returnVar = NULL;
        $output  = NULL;
  
        exec($command, $output, $returnVar);
    }
}
