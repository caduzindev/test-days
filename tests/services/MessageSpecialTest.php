<?php
use PHPUnit\Framework\TestCase;
use Services\MessageSpecial;

class MessageSpecialTest extends TestCase{
    public function testExistsAttributeInMessageSpecial(){
        $this->assertClassHasAttribute('dayName','Services\MessageSpecial');
        $this->assertClassHasAttribute('actual_date','Services\MessageSpecial');
    }
    /**
     * @dataProvider daysSpecialProvider
     */
    public function testVerifyDaysSpecialNotEmptyAndReturnString($daysData){
        foreach ($daysData as $value) {
            $message = new MessageSpecial('Monday',$value);
            $final_message = $message->getDayMessage();
    
            $this->assertNotEmpty($final_message);
            $this->assertIsString($final_message);
        }
    }
    /**
     * @dataProvider daysSpecialProvider
     */
    public function testReturnWithVariation($daysData){
        foreach ($daysData as $value) {
            $message = new MessageSpecial('Monday',$value);
            $final_message = $message->getDayMessage();
    
            $this->assertMatchesRegularExpression('/[\\(\\)]/',$final_message);
        }
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