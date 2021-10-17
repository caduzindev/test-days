<?php
use PHPUnit\Framework\TestCase;
use Services\Message;

class MessageTest extends TestCase{
    public function testExistsAttributeMessage(){
        $this->assertClassHasAttribute('dayName','Services\Message');
    }
    /**
     * @dataProvider daysProvider
     */
    public function testVerifyDaysNotEmptyAndReturnString($daysData){
        foreach ($daysData as $value) {
            $message = new Message($value);
            $final_message = $message->getDayMessage();
    
            $this->assertNotEmpty($final_message);
            $this->assertIsString($final_message);
        }
    }
    public function daysProvider(){
        return [
            [
                ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"]
            ]
        ];
    }
}