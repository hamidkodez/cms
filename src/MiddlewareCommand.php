<?php

namespace Webengrg\Cms;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class MiddlewareCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:middlewares';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Publish Middleware';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $filesystem = new Filesystem;

        if (!is_dir($directory = app_path('Http/Middleware'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(__DIR__ . '/../stubs/Middleware'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Http/Middleware/' . Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });

        $this->info('Middleware Published successfully.');
    }
}
