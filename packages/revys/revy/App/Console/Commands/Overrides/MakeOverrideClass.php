<?php

namespace Revys\Revy\App\Console\Commands\Overrides;

use Illuminate\Console\Command;
use Revys\Revy\App\Overrides;

class MakeOverrideClass extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:override {class} {--c|cached} {--f|force} {--i|index}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create override class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $class = $this->argument('class');
        $real = ! $this->option('cached');
        $force = $this->option('force');
        $index = $this->option('index');
        
        if ($class) {
            $overrides = app()->make(Overrides::class);
            $overrides->makeOverrideClass($class, $real, $force);

            if ($index) 
                $overrides->indexOverrides();
        }

        return false;
    }
}
