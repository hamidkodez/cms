<?php

namespace Webengrg\Cms;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class MigrationsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:migrations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Publish Migrations';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $filesystem = new Filesystem;
        if (!is_dir($directory = base_path('database/migrations'))) {
            mkdir($directory, 0755, true);
        }

        collect($filesystem->allFiles(__DIR__ . '/../stubs/migrations'))
            ->each(function (SplFileInfo $file) use ($filesystem) {
                $filesystem->copy(
                    $file->getPathname(),
                    base_path('database/migrations/' . $file->getFilename())
                );
            });
        $this->info('migrations generated successfully. in your project');
    }
}
