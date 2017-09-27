<?php
function getParam($toFind, $query){
    $params = explode('&', $query);
    foreach($params as $p){
        $p = strtolower($p);
        $param = explode('=', $p);
        if($param[0] === $toFind){
            return $param[1];
        }
    }
    return FALSE;
}

function saveGame($pid, $game){
    $filename = "../files/$pid.txt";
    $handle = fopen($filename, 'w') or die('Cannot open file:  '.$filename);
    fwrite($handle, json_encode($game));
    fclose($handle);
}
?>