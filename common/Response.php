<?php
class Response{
    // every response has a boolean named response in the beginning
    public $response;
    
    function __construct($bool){
        $this->response = $bool;
    }
    
    static function withReason($reason){
        // a response with reason is always an error
        // hence the false
        $instance = new self(FALSE);
        $instance->reason = $reason;
        return $instance;
    }
    
    static function withPid($pid){
        // a response with pid is always correct
        // hence the TRUE
        $instance = new self(TRUE);
        $instance->pid = $pid;
        return $instance;
    }
    
    static function withMove($ackMove){
        // a response with move is always correct
        // hence the TRUE
        // this is used when the client wins the game
        $instance = new self(TRUE);
        $instance->ack_move = $ackMove;
        return $instance;
    }
    
    static function withMoves($ackMove, $move){
        // a response with moves is always correct
        // hence the TRUE
        // this is used when the client hasn't won and we make a move
        $instance = new self(TRUE);
        $instance->ack_move = $ackMove;
        $instance->move = $move;
        return $instance;
    }
}
?>