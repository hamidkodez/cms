<?php

namespace Webengrg\Cms;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class DatabaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Publish Database files';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        function views_copy($src, $dst)
        {
            $dir = opendir($src);
            // Make the destination directory if not exist
            @mkdir($dst);
            // Loop through the files in source directory
            while ($file = readdir($dir)) {
                if (($file != '.') && ($file != '..')) {
                    if (is_dir($src . '/' . $file)) {
                        // Recursively calling custom copy function
                        // for sub directory
                        views_copy($src . '/' . $file, $dst . '/' . $file);
                    } else {
                        copy($src . '/' . $file, $dst . '/' . $file);
                    }
                }
            }
            closedir($dir);
        }
        $src = __DIR__ . '/../stubs/database';
        $dst = base_path('database');
        views_copy($src, $dst);
        $this->info('database Published successfully.');
    }
}
