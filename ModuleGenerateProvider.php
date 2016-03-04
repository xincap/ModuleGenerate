<?php

namespace Xincap\ModuleGenerate;

use Illuminate\Support\ServiceProvider;

class ModuleGenerateProvider extends ServiceProvider {

    protected $defer = true;

    /**
     * Parent command namespace.
     *
     * @var string
     */
    protected $namespace = 'Xincap\\ModuleGenerate\\Commands\\';

    /**
     * The available command shortname.
     *
     * @var array
     */
    protected $commands = [
        'Create',
        'Repository'
    ];

    /**
     * Register the commands.
     */
    public function register()
    {
        foreach ($this->commands as $command) {
            $this->commands($this->namespace.$command.'Command');
        }
    }

    /**
     * @return array
     */
    public function provides()
    {
        $provides = [];

        foreach ($this->commands as $command) {
            $provides[] = $this->namespace.$command.'Command';
        }

        return $provides;
    }

}
