<?php
// PLAY
require '../common/Common.php';
require '../common/Game.php';
require '../common/Response.php';
require 'Strategy.php';

$uri = explode('?', $_SERVER['REQUEST_URI']);
if(count($uri) > 1){
    $pid = getParam("pid", $uri[1]);
    $move = getParam("move", $uri[1]);
    $move = explode(',', $move);
    makeMove($pid, array((int)$move[0], (int)$move[1]));
}

function makeMove($pid, $move){
    $game = Game::restore($pid);
    $ackMove = $game->doMove(TRUE, $move);
    if($ackMove->isWin || $ackMove->isDraw){
        echo json_encode(Response::withMove(TRUE, $ackMove));        
    }
    else {
        if($game->strategy === "random"){
            $move = RandomStrategy::getMove(FALSE, $game->board);
        }
        else{
            $move = SmartStrategy::getMove(FALSE, $game->board);
        }
        $myMove = $game->doMove(FALSE, $move);
        echo json_encode(Response::withMoves(TRUE, $ackMove, $myMove));
    }
    saveGame($pid, $game);
}
?>