<?php
// NEW
// Abner Palomino, Roman Martinez
require '../common/Common.php';
require '../common/Game.php';
require '../common/Response.php';
/* USE POLYMORPHISM!!! */
//$uri = explode('?', 'http://cs3360.cs.utep.edu/ramartinez12//new?strategy=Smart');
$uri = explode('?', $_SERVER['REQUEST_URI']);
// check if there's a query
if(count($uri) > 1){
	// get the strategy from the query aka $uri[1]
	$strategy = getParam("strategy", $uri[1]);
	// check if the strategy is valid
	if($strategy === "smart" || $strategy === "random"){
		// everything checks out, start a new game
		newGame($strategy);
	} else if ($strategy){
		// invalid strategy received
		echo json_encode(Response::withReason("Unknown strategy"));
	} else {
		// no strategy found in the query
		echo json_encode(Response::withReason("Strategy not specified"));
	}
} else {
	// $uri did not contain a query
	echo json_encode(Response::withReason("Strategy not specified"));
}
function newGame($strategy){
	 $pid = uniqid();
	//$pid = "59cb50f4b9c23";
	$game = new Game($strategy);
	saveGame($pid, $game);
	echo json_encode(Response::withPid($pid));
}
?>
