<?php
class RandomStrategy{
	static function getMove($board){
		for(;;){
			$move[0] = rand(0, 14);
			$move[1] = rand(0, 14);
			if(!$board[$move[0]][$move[1]]){
				return $move;
			}
		}
	}
}

class SmartStrategy{
	static function getMove($bool, $board, $lastMove){
		
		$playerValue = $board[$lastMove[0]][$lastMove[1]];
		$startIndexH= ($lastMove[0]<4)? 0 : $lastMove[0]-4;
		$endIndexH = ($lastMove[0]>10)? 14 : $lastMove[0]+4;
		$startIndexV = ($lastMove[1]<4)? 0 : $lastMove[1]-4;
		$endIndexV = ($lastMove[1]>10)? 14 : $lastMove[1]+4;
		$counth = 0;
		$countv= 0;
		$count1 = 0;
		$count2 = 0;
		$count3 = 0;
		$count4 = 0;
		$temp = 0;
		$tempValue = array(0,0);	
		
		//echo json_encode($playerMove);
		
		//TODO check if there is a win in horizontal of the last move in the board
		for($i = $startIndexH; $i < $endIndexH; $i++){
			//echo json_encode($tempValue);
			if($board[$i][$lastMove[1]] == $playerValue){
				$counth++;
			} else if($counth >= $temp){
				$temp = $counth;
				if($temp > 2 && $board[$i][$lastMove[1]] == 0){
					//echo json_encode($board[$i][$lastMove[1]]);
					$tempValue[0] = $i;
					$tempValue[1] = $lastMove[1];
					break;
				} else if($temp > 2 && $board[$i][$lastMove[1]] == 2){
					$tempValue[0] = $i-3;
					$tempValue[1] = $lastMove[1];
				} else {
					$tempValue[0] = rand(0, 14);
					$tempValue[1] = rand(0, 14);
				}
			}
		}
		
		//echo json_encode($tempValue);
		
		//TODO checks if there is a win in the vertical of the last move on the board
		for($i = $startIndexV; $i < $endIndexV; $i++){
			//echo json_encode($tempValue);
			if($board[$lastMove[0]][$i] == $playerValue){
				$countv++;
			} else if($countv >= $temp){
						$temp = $countv;
						if($temp > 2 && $board[$lastMove[0]][$i] == 0){
							$tempValue[0] = $lastMove[0];
							$tempValue[1] = $i;
							break;
						}  else if($temp > 2 && $board[$i][$lastMove[1]] == 2){
							$tempValue[0] = $i-3;
							$tempValue[1] = $lastMove[1];
						} else {
							$tempValue[0] = rand(0, 14);
							$tempValue[1] = rand(0, 14);
						}
					}
				}
				return $tempValue;
	}
}
/**
 //TODO checks if there is a win for the both diagonals for the last move
 for($x = 4; $x < 15; $x++){
 for($i = 0; $i <= $x; $i++){
 if($board[$x-$i][$i] == $playerMove){
 $count1++;
 if($count1 == 5){
 return 1;
 }
 } else {
 $count1 = 0;
 }
 if($board[14-$x+$i][14-$i] == $playerMove){
 $count2++;
 if($count2 == 5){
 return 1;
 }
 } else {
 $count2 = 0;
 }
 
 if($board[14-$x+$i][$i] == $playerMove){
 $count3++;
 if($count3 == 5){
 return 1;
 }
 } else {
 $count3 = 0;
 }
 if($board[$i][14-$x+$i] == $playerMove){
 $count4++;
 if($count4 == 5){
 return 1;
 }
 } else {
 $count4 = 0;
 }
 }
 }
 **/
?>
	

