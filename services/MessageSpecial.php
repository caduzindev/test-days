<?php
namespace Services;
use Contracts\OutputMessageDay;
use Repositories\Days;

class MessageSpecial implements OutputMessageDay{
    private $dayName;
    private $actual_date;

    public function __construct($dayName,$actual_date){
        $this->dayName = $dayName;
        $this->actual_date = $actual_date;
    }
    public function getDayMessage(){
        $days = (new Days())->getDays();
        $daysSpecial = (new Days())->getDaysSpecial();

        $message = $days[$this->dayName].'( '.$daysSpecial[$this->actual_date].' )';

        return $message;
    }
}