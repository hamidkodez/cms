<?php

namespace Webengrg\Cms;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Finder\SplFileInfo;

class RoutesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cms:routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'To Publish  Routes';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        file_put_contents(
            base_path('routes/web.php'),
            file_get_contents(__DIR__ . '/../stubs/routes/route.stub'),
            FILE_APPEND
        );
        
//        file_put_contents(
//            base_path('routes/web.php'),
//            file_get_contents(__DIR__ . '/../stubs/routes/backend.stub'),
//            FILE_APPEND
//        );
//        file_put_contents(
//            base_path('routes/web.php'),
//            file_get_contents(__DIR__ . '/../stubs/routes/frontend.stub'),
//            FILE_APPEND
//        );
//        file_put_contents(
//            base_path('routes/web.php'),
//            file_get_contents(__DIR__ . '/../stubs/routes/artisan.stub'),
//            FILE_APPEND
//        );
        $this->info('Routes published successfully.');
    }
}
