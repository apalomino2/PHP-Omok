<?php
require 'PlayerMove.php';
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
        // read the file with the game
        // this is where we would check if pid is valid
        // with invalid pid, return false and handle in play/index.php
        $filename = "../writable/savedGames/$pid.txt";
        $handle = fopen($filename, 'rb') or die('Cannot open file:  '.$filename);
        $content = fread($handle, filesize($filename));
        fclose($handle);
        
        $previous = json_decode($content);
        // construct is kinda nasty cuz we make a new board but overwrite it later
        // we can probably fix this later
        $instance = new self($previous->strategy);
        // convert board from stdClass to array of arrays
        $instance->board = json_decode(json_encode($previous->board), TRUE);
        // return the restored game
        return $instance;
    }
    
    function doMove($player1, $move){
        // TODO check if valid move
        $this->board[$move[0]][$move[1]] = ($player1)? 1 : 2;
        // the value tells us if it was a win, draw, or neither
        $result = $this->checkWin($move);
        switch ($result){
            case 0:
                // move didn't result in either win or draw
                return new PlayerMove($move[0], $move[1], FALSE, FALSE, array());
            case 1:
                // move resulted in a win
                return new PlayerMove($move[0], $move[1], TRUE, FALSE, array());
            case 2:
                // move resulted in a draw
                return new PlayerMove($move[0], $move[1], FALSE, TRUE, array());
        }
    }
    
    function checkWin($lastMove){
        // needs implementation! :o
        // currently it's always nothing! -.-
        //for($i = 1; $i < 5; $i++){
        	//if($lastMove[0]<14){
        		//$board[0][$lastMove[0]][$lastMove[1]];
        	//}
        //}
        //For loop that identifies if the game is a Draw
        for($i = 0; $i < 15; $i++){
        	for($j = 0; $j < 15; $j++){
        		if($this -> board[$i][$j] === 0){
        			return 0;
        		} 
        	}
        }
        
        return 2;
    }
}
?>
