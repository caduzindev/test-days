<?php
namespace Services;
use Contracts\OutputMessageDay;
use Repositories\Days;

class Message implements OutputMessageDay{
    private $dayName;

    public function __construct($dayName){
        $this->dayName = $dayName;
    }
    public function getDayMessage(){
        $days = (new Days())->getDays();

        return $days[$this->dayName];
    }
}