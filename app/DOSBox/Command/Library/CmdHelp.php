<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

use DOSBox\Command\BaseCommand as Command;

class CmdHelp extends Command {
    public $executed = false;

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return false;
    }

    public function checkParameterValues(IOutputter $outputter) {
        return false;
    }

    public function execute(IOutputter $outputter){
        $this->outputter->printLine("Acceptance Criterias: " );
        $this->executed = true;
    }
}