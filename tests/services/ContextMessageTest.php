<?php
use PHPUnit\Framework\TestCase;
use Services\ContextMessage;
use Services\Message;
use Services\MessageSpecial;

class ContextMessageTest extends TestCase{
    public function testExistsAttributeContextMessage(){
        $this->assertClassHasAttribute('strategyOutput','Services\ContextMessage');
    }
    /**
     * @dataProvider daysProvider
     */
    public function testMessageOutputPattern($daysData){
        $Context = new ContextMessage();
        
        foreach ($daysData as $value) {
            $message = new Message($value);
            $Context->setOutput($message);
    
            $this->assertNotEmpty($Context->getMessage());
    
            $this->assertIsString($Context->getMessage());
    
            $this->assertDoesNotMatchRegularExpression('/[\\(\\)]/',$Context->getMessage());
        }
    }
    /**
     * @dataProvider daysSpecialProvider
     */
    public function testeMessageSpecialOutputPattern($daysData){
        $Context = new ContextMessage();
        $dayFix = 'Monday';

        foreach ($daysData as $value) {
            $message = new MessageSpecial($dayFix,$value);
            $Context->setOutput($message);
    
            $this->assertNotEmpty($Context->getMessage());
    
            $this->assertIsString($Context->getMessage());
    
            $this->assertMatchesRegularExpression('/[\\(\\)]/',$Context->getMessage());
        }
    }  
    public function daysProvider(){
        return [
            [
                ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"]
            ]
        ];
    }
    public function daysSpecialProvider(){
        return [
            [
                [
                    "1/1",
                    "19/2",
                    "5/3",
                    "15/3",
                    "17/4",
                    "21/4",
                    "23/4",
                    "1/5",
                    "12/5",
                    "12/6",
                    "20/6",
                    "15/7",
                    "11/8",
                    "7/9",
                    "12/10",
                    "15/11",
                    "29/11",
                    "25/12",
                ]
            ]
        ];
    }
}