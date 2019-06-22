<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\Directory;
use DOSBox\Command\BaseCommand as Command;

class CmdMkDir extends Command {
    const PARAMETER_CONTAINS_BACKLASH = "At least one parameter denotes a path rather than a directory name.";

    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return $numberOfParametersEntered >= 1 ? true : false;
    }

    public function checkParameterValues(IOutputter $outputter) {
        for($i=0; $i< $this->getParameterCount(); $i++) {
            if ($this->parameterContainsBacklashes($this->getParameterAt($i), $outputter))
                return false;
        }
        return true;
    }

    // TODO: Unit test
    public static function parameterContainsBacklashes($parameter, IOutputter $outputter) {
        // Do not allow "mkdir c:\temp\dir1" to keep the command simple
        if (strstr($parameter, "\\") !== false || strstr($parameter, "/") !== false) {
            $outputter->printLine(self::PARAMETER_CONTAINS_BACKLASH);
            return true;
        }

        return false;
    }

    public function execute(IOutputter $outputter){
        $basename = "";
        for($i=0; $i < $this->getParameterCount(); $i++) {
            $dirContent =$this->getDrive()->getCurrentDirectory()->getContent();
            if (count($dirContent) > 0){
                foreach ($dirContent as $item) {
                    $basename = $this->chopExtension($item->getName());
                    if ($basename == ""){
                        $basename = $item->getName();
                    }
                    if ($basename == $this->params[$i]){
                        $outputter->printLine("Maaf nama File atau Folder ".$item->getName()." sama");
                    } else {
                        $this->createDirectory($this->params[$i], $this->getDrive());
                    }
                }
                
            } else {
                $this->createDirectory($this->params[$i], $this->getDrive());
            }
        }
    }

    public function createDirectory($newDirectoryName, IDrive $drive) {
        $newDirectory = new Directory($newDirectoryName);
        $drive->getCurrentDirectory()->add($newDirectory);
    }

    public function chopExtension($filename) {
        return substr($filename, 0, strrpos($filename, '.'));
    }
}