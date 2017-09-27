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
    
    static function withMoves($bool, $ack_move, $move){
        $instance = new self($bool);
        $this->ack_move = $ack_move;
        $this->move = $move;
        return $instance;
    }
}
?>