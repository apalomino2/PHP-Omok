<?php
class PlayerMove{
    public $x;
    public $y;
    public $isWin;
    public $isDraw;
    
    function __construct($x, $y, $isWin, $isDraw){
        $this->x = $x;
        $this->y = $y;
        $this->isWin = $isWin;
        $this->isDraw = $isDraw;
    }
}
?>