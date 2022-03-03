<?php

namespace Syedhamidalishahofficial\Cms;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class ViewsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:views';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Publish Views';

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
        $src = __DIR__ . '/../stubs/Views';
        $dst = resource_path('views');
        views_copy($src, $dst);

        $this->info('Views Published successfully.');
    }
}
