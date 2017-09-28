<?php
// NEW
require '../common/Common.php';
require '../common/Game.php';
require '../common/Response.php';

$uri = explode('?', $_SERVER['REQUEST_URI']);
if(count($uri) > 1){
    $strategy = getParam("strategy", $uri[1]);
    if($strategy === "smart" || $strategy === "random"){
        newGame($strategy);
    } elseif ($strategy){
        echo json_encode(Response::withReason(FALSE, "Unknown strategy"));
    } else {
        echo json_encode(Response::withReason(FALSE, "Strategy not specified"));
    }
} else {
    echo json_encode(Response::withReason(FALSE, "Strategy not specified"));
}

function newGame($strategy){
    //$pid = uniqid();
    $pid = "59cb50f4b9c23";
    $game = new Game($strategy);
    saveGame($pid, $game);
    echo json_encode(Response::withPid(TRUE, $pid));
}
?>