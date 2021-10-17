<?php
namespace Services;
use Contracts\OutputMessageDay;

class ContextMessage{
    private $strategyOutput;
    
    public function setOutput(OutputMessageDay $strategyOutput)
    {
        $this->strategyOutput = $strategyOutput;
    }
    public function getMessage()
    {
        return $this->strategyOutput->getDayMessage();
    }
}