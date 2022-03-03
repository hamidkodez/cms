<?php

namespace Syedhamidalishahofficial\Cms;

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
//        Auth Controller
        if (!is_dir($directory = app_path('Http/Controllers/Auth'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(__DIR__ . '/../stubs/Auth'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/Auth/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });


        //Frontend Controller
        if (!is_dir($directory = app_path('Http/Controllers/Frontend'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(__DIR__ . '/../stubs/Controllers/Frontend'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/Frontend/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });


//        Backend Controller
        if (!is_dir($directory = app_path('Http/Controllers/Backend'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(__DIR__ . '/../stubs/Controllers/Backend'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Controllers/Backend/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });
        $this->info('Authentication scaffolding generated successfully.');
    }
}
