<?php
// PLAY
//Abner Palomino, Roman Martinez
require '../common/Common.php';
require '../common/Game.php';
require '../common/Response.php';
require 'Strategy.php';
$uri = explode('?', $_SERVER['REQUEST_URI']);
//$uri = explode('?','http://cs3360.cs.utep.edu/ramartinez12//play?pid=59cb50f4b9c23&move=4,4');
// check is there's a query
if(count($uri) > 1){
	// get the pid from the query aka $uri[1]
	$pid = getParam("pid", $uri[1]);
	// check if strategy was found
	if($pid){
		// get the $move from the query
		$move = getParam("move", $uri[1]);
		if($move){
			$move = explode(',', $move);
			// convert move to integer array and make the move
			//echo json_encode($move);
			makeMove($pid, array((int)$move[0], (int)$move[1]));
		}
		else{
			echo json_encode(Response::withReason("Move not specified"));
		}
	} else {
		echo json_encode(Response::withReason("Pid not specified"));
	}
} else {
	// $uri did not contain a query
	echo json_encode(Response::withReason("No pid or move specified"));
}
function makeMove($pid, $move){
	//echo json_encode($move);
	// restore the saved game
	$game = Game::restore($pid);
	// TODO check is valid move
	$ackMove = $game->doMove(TRUE, $move);
	if($ackMove->isWin || $ackMove->isDraw){
		echo json_encode(Response::withMove($ackMove));
	}
	else {
		if($game->strategy === "random"){
			$move = RandomStrategy::getMove($game->board);
		}
		else{
			$move = SmartStrategy::getMove(FALSE, $game->board, $move);
		}
		$myMove = $game->doMove(FALSE, $move);
		echo json_encode(Response::withMoves($ackMove, $myMove));
	}
	saveGame($pid, $game);
}
?>
