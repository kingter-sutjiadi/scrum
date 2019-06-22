<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

use DOSBox\Command\BaseCommand as Command;

class CmdVer extends Command {
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
            if($param == '/W') {
                    $outputter->printLine(" [Version 5.1.2600]");
                    $outputter->printLine(" Aldo | Afdolash Nur Kaffah -- afdolash.kaffah@idntimes.com ");
                    $outputter->printLine(" Uki | Muhibush Shulhi Muhammad -- muhibush.muhammad@idntimes.com ");
                    $outputter->printLine(" Arfian | Arfian Bagus Nurmajid -- arfian.nurmajdi@idntimes.com ");
                    $outputter->printLine(" Gun | Stefanus Gunawan Hindorjono -- stefanus.hindrojono@idntimes.com ");
                    $outputter->printLine(" Kingter | Kingter Sutjiadi -- kingter.sutjiadi@idntimes.com ");
                } else {
                    $outputter->printLine("[Version 5.1.2600]");
                }
        } else {
            $outputter->printLine("[Version 5.1.2600]");
        }
        $this->executed = true;
    }
}