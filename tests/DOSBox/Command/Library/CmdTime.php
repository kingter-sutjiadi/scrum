<?php
//namespace Tests\Command\Library;

//use Tests\DOSBoxTestCase;

use DOSBox\Filesystem\Directory;
use DOSBox\Command\Library\CmdMkFile;
use DOSBox\Filesystem\Drive;

class CmdTime extends DOSBoxTestCase {
    private $command;
    private $drive;
    private $rootDir;
    private $numbersOfFilesBeforeTest;

    protected function setUp() {
        parent::setUp();
        $this->drive = new Drive("C");
        $this->command = new CmdMkFile("mkfile", $this->drive);
        $this->rootDir = $this->drive->getRootDir();

        $this->commandInvoker->addCommand($this->command);

        $this->numbersOfFilesBeforeTest = $this->drive->getRootDirectory()->getNumberOfContainedFiles();
    }

    public function testCmdTime() {

        $this->executeCommand("time");
        $this->assertNotNull($this->mockOutputter);
        
    }

    public function testCmdTime_WithWrongParameter() {
        $correctTime = '12:00:00';
        $wrongTime = 'asdasdsad';

        $this->executeCommand("time ". $correctTime);
        $this->assertNotNull($this->mockOutputter);

        $this->executeCommand("time ". $wrongTime);
        $this->assertNotNull($this->mockOutputter);
        
    }

} 