<?php
class RandomStrategy{
    static function getMove($board){
        for(;;){
            $move[0] = rand(0, 14);
            $move[1] = rand(0, 14);
            if(!$board[$move[0]][$move[1]]){
                return $move;
            }   
        }
    }
}

class SmartStrategy{
    static function getMove($board){
        return array(11, 12);   
    }
}