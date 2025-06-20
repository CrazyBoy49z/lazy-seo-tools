<?php

namespace Step2dev\LazySeoTools\Commands;

use Illuminate\Console\Command;

class LazySeoCommand extends Command
{
    public $signature = 'lazy-seo';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
