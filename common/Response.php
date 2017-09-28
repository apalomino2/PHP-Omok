<?php
class Response{
    public $response;
    
    function __construct($bool){
        $this->response = $bool;
    }
    
    static function withReason($bool, $reason){
        $instance = new self($bool);
        $instance->reason = $reason;
        return $instance;
    }
    
    static function withPid($bool, $pid){
        $instance = new self($bool);
        $instance->pid = $pid;
        return $instance;
    }
    
    static function withMove($bool, $ackMove){
        $instance = new self($bool);
        $instance->ack_move = $ackMove;
        return $instance;
    }
    
    static function withMoves($bool, $ackMove, $move){
        $instance = new self($bool);
        $instance->ack_move = $ackMove;
        $instance->move = $move;
        return $instance;
    }
}
?>