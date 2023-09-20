<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DbFresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:fresh {--seed} {--yes}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all database and stored files then run new migrations';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        if ($this->option('yes') || $this->confirm('Do you wish to continue? [yes|no]')) {
            $migrateOptions = ['--seed' => $this->option('seed')];
            $this->call('migrate:fresh', $migrateOptions);

            if (app()->environment('local')) {
                $files = Storage::disk('public')->files();
                $files = array_filter($files, function ($item) {
                    return $item !== '.gitignore';
                });
                $dirs = Storage::disk('public')->directories();
                foreach ($dirs as $dir) {
                    Storage::disk('public')->deleteDirectory($dir);
                }
                foreach ($files as $file) {
                    Storage::disk('public')->delete($file);
                }
            }
        }
        $this->call('ide-helper:models', ['--write' => '--write']);
    }
}
