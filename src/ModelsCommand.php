<?php

namespace Webengrg\Cms;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class ModelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:models';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Publish Models';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        if (! is_dir($directory = app_path('Models'))) {
            mkdir($directory, 0755, true);
        }

        $filesystem = new Filesystem;

        collect($filesystem->allFiles(__DIR__.'/../stubs/Models'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    app_path('Models/'.Str::replaceLast('.stub', '.php', $file->getFilename()))
                );
            });

        $this->info('Authentication scaffolding generated successfully.');
    }
}
