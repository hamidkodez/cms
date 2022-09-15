<?php

namespace Webengrg\Cms;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class ControllersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:controllers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Publish Controllers';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $filesystem = new Filesystem;
//        auth Controller
        if (!is_dir($directory = app_path('Http/Controllers/auth'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(__DIR__ . '/../stubs/Controllers/auth'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/auth/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });


        //frontend Controller
        if (!is_dir($directory = app_path('Http/Controllers/frontend'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(__DIR__ . '/../stubs/Controllers/frontend'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/frontend/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });


//        backend Controller
        if (!is_dir($directory = app_path('Http/Controllers/backend'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(__DIR__ . '/../stubs/Controllers/backend'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/backend/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });
        $this->info('Authentication scaffolding generated successfully.');
    }
}
