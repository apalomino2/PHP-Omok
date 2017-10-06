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
		
		$playerMove = $board[$lastMove[0]][$lastMove[1]];
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
			if($board[$i][$lastMove[1]] == $playerMove){
				$counth++;
			} else if($counth > $temp){
				$temp = $counth;
				if($temp >= 2 && $board[$i][$lastMove[1]] == 0){
					//echo json_encode($temp);
					$tempValue[0] = $i;
					$tempValue[1] = $lastMove[1];
					break;
				} else if($temp > 1 && $board[$i][$lastMove[1]] == 2){
					$tempValue[0] = $lastMove[0]-1;
					$tempValue[1] = $lastMove[1];
					break;
				} else {
					//if($temp > 3){echo json_encode($temp);}
					$tempValue = RandomStrategy::getMove($board);
				}
			}
		}
		
		//echo json_encode($tempValue);
		
		//TODO checks if there is a win in the vertical of the last move on the board
		for($i = $startIndexV; $i < $endIndexV; $i++){
			if($board[$lastMove[0]][$i] == $playerMove){
				$countv++;
			} else if($countv > $temp){
						$temp = $countv;
						if($temp >= 2 && $board[$lastMove[0]][$i] == 0){
							//echo json_encode($temp);
							$tempValue[0] = $lastMove[0];
							$tempValue[1] = $i;
							break;
						} else if($temp > 1 && $board[$lastMove[0]][$i] == 2){
							$tempValue[0] = $lastMove[0];
							$tempValue[1] = $lastMove[1]-1;
							break;
						} else {
							//if($temp > 3){echo json_encode($temp);}
							$tempValue = RandomStrategy::getMove($board);
						}
					}
				}
			
	
		return $tempValue;
	}
	
}
?>
	

