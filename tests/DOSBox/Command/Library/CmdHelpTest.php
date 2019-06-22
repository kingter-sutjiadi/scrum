<?php
//namespace Tests\Command\Library;

//use Tests\DOSBoxTestCase;

use DOSBox\Filesystem\Directory;
use DOSBox\Command\Library\CmdHelp;
use DOSBox\Filesystem\Drive;

class CmdHelpTest extends DOSBoxTestCase {
    private $command;
    private $drive;
    private $rootDir;
    // private $numbersOfFilesBeforeTest;

    protected function setUp() {
        parent::setUp();
        $this->drive = new Drive("C");
        $this->command = new CmdHelp("help", $this->drive);
        $this->rootDir = $this->drive->getRootDir();

        $this->commandInvoker->addCommand($this->command);
    }

    public function testCmdHelp_WithoutContent_ShowListHelp() {
        $this->executeCommand("help");
        $this->assertNotNull($this->mockOutputter);
    }

    public function testCmdHelp_WithContent_Accepted() {
        $listHelp = array('CD','DIR','EXIT','FORMAT','HELP','LABEL','MKDIR','MKFILE','MOVE');
        foreach($listHelp as $item){
            // var_dump($item);
            $this->executeCommand("help " . $item);
            $this->assertNotNull($this->mockOutputter);
        }
    }

    public function testCmdHelp_WithContent_NotAccepted(){
        $this->executeCommand("help " . 'asdwfwef');
        $this->assertNotNull($this->mockOutputter);
    }

} 