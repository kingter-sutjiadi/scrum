<?php

namespace DOSBox\Command\Library;

use DOSBox\Interfaces\IDrive;
use DOSBox\Interfaces\IOutputter;
use DOSBox\Filesystem\File;
use DOSBox\Filesystem\FileSystemItem;
use DOSBox\Command\BaseCommand as Command;

class CmdMkFile extends Command {
    public function __construct($commandName, IDrive $drive){
        parent::__construct($commandName, $drive);
    }

    public function checkNumberOfParameters($numberOfParametersEntered) {
        return true;
    }

    public function checkParameterValues(IOutputter $outputter) {
        return true;
    }

    public function execute(IOutputter $outputter){
        $fileName = $this->params[0];
        $basename = "";
        $dirContent =$this->getDrive()->getCurrentDirectory()->getContent();

        if (count($dirContent) > 0){
            foreach ($dirContent as $item) {
                $basename = $this->chopExtension($item->getName());
                if ($basename == ""){
                    $basename = $item->getName();
                }
                if ($basename == $this->chopExtension($fileName)){
                    $outputter->printLine("Maaf File atau Folder ". $basename ." sama");
                } else {
                    if (count($this->params) > 1){
                        $fileContent = $this->params[1];
                        $newFile = new File($fileName, $fileContent);
                    } else {
                        $newFile = new File($fileName, null);
                    }
                    $this->getDrive()->getCurrentDirectory()->add($newFile);
                }
            }
        } else {
            if (count($this->params) > 1){
                $fileContent = $this->params[1];
                $newFile = new File($fileName, $fileContent);
            } else {
                $newFile = new File($fileName, null);
            }
            $this->getDrive()->getCurrentDirectory()->add($newFile);
        }
        
    }

    public function chopExtension($filename) {
        return substr($filename, 0, strrpos($filename, '.'));
    }

}