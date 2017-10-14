<?php
$strategies = array("Smart", "Random");
$size = 15;
$test = new Gameinfo($size,$strategies);
if(empty($_SERVER["REQUEST_METHOD"])){
	json_encode("URL not found");
} else {
	$test -> toJson();
}

class GameInfo{
	public $size;
	public $strategies;
	
	public function __construct($size, $strategies){
		$this -> size = $size;
		$this -> strategies = $strategies;
	}
	
	public function toJson(){
		echo json_encode($this);
	}
}
?>
