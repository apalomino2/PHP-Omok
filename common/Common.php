<?php
// used to get the parammeters from the query
// extra parameters and order doesn't matter
function getParam($toFind, $query){
    $params = explode('&', $query);
    foreach($params as $p){
        $p = strtolower($p);
        $param = explode('=', $p);
        if($param[0] === $toFind){
            if($param[1]){
                return $param[1];
            }
            else {
                break;
            }
        }
    }
    return FALSE;
}

function saveGame($pid, $game){
    // write json version of game to a file named with pid
    $filename = "../writable/savedGames/$pid.txt";
    // TODO handle the case where file isn't found with Response
    $handle = fopen($filename, 'w') or die('Cannot open file:  '.$filename);
    fwrite($handle, json_encode($game));
    fclose($handle);
}
?>