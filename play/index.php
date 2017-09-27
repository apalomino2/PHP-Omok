<?php
// PLAY
require '../common/Common.php';
require '../common/Game.php';

echo file_get_contents("../files/59cb50f4b9c23.txt");
echo "<br><br><br>";

$uri = explode('?', $_SERVER['REQUEST_URI']);
if(count($uri) > 1){
    $pid = getParam("pid", $uri[1]);
    $move = getParam("move", $uri[1]);
    makeMove($pid, $move);
}

function makeMove($pid, $move){
    $move = explode(',', $move);
    $game = Game::restore($pid);
    $game->doMove(TRUE, $move);
    saveGame($pid, $game);
}
?>