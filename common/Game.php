<?php
class Game{
    public $board;
    public $strategy;
    function __construct($strategy){
        $this->board = array(
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
            array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
        );
        $this->strategy = $strategy;
    }
    
    static function restore($pid){
        $filename = "../files/$pid.txt";
        $handle = fopen($filename, 'rb') or die('Cannot open file:  '.$filename);
        $content = fread($handle, filesize($filename));
        fclose($handle);
        
        $previous = json_decode($content);
        $instance = new self($previous->strategy);
        $instance->board = json_decode(json_encode($previous->board), TRUE);
        return $instance;
    }
    
    function doMove($player1, $move){
        $this->board[$move[0]][$move[1]] = ($player1)? 1 : 2;
        $this->checkWin();
    }
    
    function checkWin(){
        echo "No one wins!-.-<br>";
    }
}