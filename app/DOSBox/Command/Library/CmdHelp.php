<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;

use DOSBox\Command\BaseCommand as Command;

class CmdHelp extends Command {
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
                if($param == 'CD')
                    $outputter->printLine($this->params[0]." Displays the name of or changes the current directory." );
                if($param == 'DIR')
                    $outputter->printLine($this->params[0]." Displays a list of files and subdirectories in a directory" );
                if($param == 'EXIT')
                    $outputter->printLine($this->params[0]." Quits the CMD.EXE program (command interpreter)" );
                if($param == 'FORMAT')
                    $outputter->printLine($this->params[0]." Formats a disk for use with Windows" );
                if($param == 'HELP')
                    $outputter->printLine($this->params[0]." Provides Help information for Windows commands" );
                if($param == 'LABEL')
                    $outputter->printLine($this->params[0]." Creates, changes, or deletes the volume label of a disk" );
                if($param == 'MKDIR')
                    $outputter->printLine($this->params[0]." Creates a directory" );
                if($param == 'MKFILE')
                    $outputter->printLine($this->params[0]." Creates a file" );
                if($param == 'MOVE')
                    $outputter->printLine($this->params[0]." Moves one or more files from one directory to another directory" );      
        } else {
            $outputter->printLine("Acceptance Criterias: " );
            $outputter->printLine("   CD Displays the name of or changes the current directory. " );
            $outputter->printLine("   DIR Displays a list of files and subdirectories in a directory" );
            $outputter->printLine("   Exit Quits the CMD.EXE program (command interpreter)" );
            $outputter->printLine("   FORMAT Formats a disk for use with Windows " );
            $outputter->printLine("   HELP Provides Help information for Windows commands" );
            $outputter->printLine("   LABEL Creates, changes, or deletes the volume label of a disk" );
            $outputter->printLine("   MKDIR Creates a directory" );
            $outputter->printLine("   MKFILE Creates a file" );
            $outputter->printLine("   MOVE Moves one or more files from one directory to another directory" );
        }
        $this->executed = true;
    }
}