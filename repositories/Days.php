<?php
namespace Repositories;

class Days{
    public function getDays(){
        $json = json_decode(file_get_contents(__DIR__.'/../data/days.json'),true);

        return $json;
    }
    public function getDaysSpecial(){
        $json = json_decode(file_get_contents(__DIR__.'/../data/specialDays.json'),true);

        return $json;
    }
}