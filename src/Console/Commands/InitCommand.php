<?php

namespace PwaBlui\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize App';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        Artisan::call('migrate -n --force', [], $this->output);

        $this->additionalThings();
    }

    public function additionalThings()
    {

    }
}
