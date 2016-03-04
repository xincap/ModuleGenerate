<?php

namespace XinExt\ModuleGenerate\Commands;

use Illuminate\Console\Command;
use XinExt\ModuleGenerate\Generators\Module;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

class CreateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $name = 'module:make';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate new full module';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function fire()
    {
        $names = $this->argument('name');

        foreach ($names as $name) {
            with(new Module($name))
                ->setFilesystem($this->laravel['files'])
                ->setModule($this->laravel['modules'])
                ->setConfig($this->laravel['config'])
                ->setConsole($this)
                ->setForce($this->option('force'))
                ->setPlain($this->option('plain'))
                ->generate();
        }
    }

    /**
     * Get the console command arguments.
     *
     * @return array
     */
    protected function getArguments()
    {
        return array(
            array('name', InputArgument::IS_ARRAY, 'The names of modules will be created.'),
        );
    }

    protected function getOptions()
    {
        return [
            array('plain', 'p', InputOption::VALUE_NONE, 'Generate a plain module (without some resources).'),
            array('force', null, InputOption::VALUE_NONE, 'Force the operation to run when module already exist.'),
        ];
    }
}
