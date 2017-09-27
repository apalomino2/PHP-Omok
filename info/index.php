<?php
// INFO
class GameInfo{
    public $size;
    public $strategies;
    function __construct($size, $strategies){
        $this->size = $size;
        $this->strategies = $strategies;
    }
}
$info = new GameInfo(15, array("Smart", "Random"));
echo json_encode($info);
?>