<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

use DOSBox\Command\BaseCommand as Command;

class CmdVol extends Command {
    public $executed = true;

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return true;
    }

    public function checkParameterValues(IOutputter $outputter) {
        return true;
    }

    public function execute(IOutputter $outputter) {
        if($this->getParameterCount() == 1) {
            $param = strtoupper($this->params[0]);
            if($param == 'C:') {
                    $outputter->printLine("Volume in drive C is Hello World");
                    $outputter->printLine("Volume Serial Number is 1E16-3FE3");
                } else {
                    $outputter->printLine("The system cannot find the drive specified");
                }
        } else {
            $outputter->printLine("Volume in drive C is Hello World");
            $outputter->printLine("Volume Serial Number is 1E16-3FE3");
        }
        $this->executed = true;
    }
}