<?php

namespace XinExt\ModuleGenerate\Generators;

use Pingpong\Modules\Generators\ModuleGenerator;

class Module extends ModuleGenerator {
    
    public function generateResources() {
        parent::generateResources();
        $this->console->call('module:make-repository', [
            'name' => $this->getName(),
            'module' => $this->getName()
        ]);
    }
}

