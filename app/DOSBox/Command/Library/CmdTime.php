<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use Datetime;

use DOSBox\Command\BaseCommand as Command;

class CmdTime extends Command {
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
        if ($this->getParameterCount() == 1) {
            $param = strtoupper($this->params[0]);
            $d = DateTime::createFromFormat("H:i:s", $param);
            if($d && $d->format("H:i:s") === $param) {

            } else {
                $outputter->printLine("Invalid Time Format");
            }
                 
        } else {
            $outputter->printLine(date('H:i:s'));
        }
        $this->executed = true;
    }
}