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
		
		//echo json_encode($lastMove);
		
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
		$tempX = 0;
		$tempY = 0;
		
		
		
		//TODO check if there is a win in horizontal of the last move in the board
		for($i = $startIndexH; $i < $endIndexH; $i++){
			if($board[$i][$lastMove[1]] == $playerMove){
				$counth++;
				if($board[$i][$lastMove[1]] != $playerMove){
					if($counth < $temp){
						$counth = $temp;
						if($board[$i][$lastMove[1]] == 0){
						$tempX = $i;
						$tempY = $lastMove[1];
						}
					} 
					break;
				}
			}
		}
		
		
		//TODO checks if there is a win in the vertical of the last move on the board
		for($i = $startIndexV; $i < $endIndexV; $i++){
			if($board[$lastMove[0]][$i] == $playerMove){
				$counth++;
				if($board[$lastMove[0]][$i] != $playerMove){
					if($counth < $temp){
						$counth = $temp;
						if($board[$i][$lastMove[1]] == 0){
							$tempX = $i;
							$tempY = $lastMove[1];
						}
					} 
					break;
				}
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
		return array($tempX, $tempY);
	}
}
?>
