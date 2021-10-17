<?php
require "./vendor/autoload.php";

use Services\ContextMessage;
use Services\Message;
use Services\MessageSpecial;

use Repositories\Days;

class DayManager{
    private $day;
    private $month;
    private $dayName;

    public function __construct($day,$month,$dayName){
        $this->day = $day;
        $this->month = $month;
        $this->dayName = $dayName;
    }
    public function getMessageOfDay(){
        $day = new Days();
        $daySpecials = $day->getDaysSpecial();

        $ContextMessage = new ContextMessage();

        if(array_key_exists($this->actual_date(),$daySpecials)){
            $ContextMessage->setOutput(new MessageSpecial($this->dayName,$this->actual_date()));
        }else{
            $ContextMessage->setOutput(new Message($this->dayName));
        }
        
        return $ContextMessage->getMessage();
    }
    private function actual_date(){
        return $this->day.'/'.$this->month;
    }
}
$date = getDate();

$day = $date['mday'];
$month = $date['mon'];
$dayName = $date['weekday'];

echo '<h1>'.(new DayManager($day,$month,$dayName))->getMessageOfDay().'</h5>';