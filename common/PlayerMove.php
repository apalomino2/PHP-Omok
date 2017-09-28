<?php
class PlayerMove{
    public $x;
    public $y;
    public $isWin;
    public $isDraw;
    public $row;
    
    function __construct($x, $y, $isWin, $isDraw, $row){
        $this->x = $x;
        $this->y = $y;
        $this->isWin = $isWin;
        $this->isDraw = $isDraw;
        $this->row = $row;
    }
}
?>