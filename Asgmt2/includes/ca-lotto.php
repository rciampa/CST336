<?php
//Generate the numbers for the CA lotto games
$superLotto = array();

for ($i = 0; $i < 5; $i++) {
	
	$randNum = 0;
	
	do {
		$randNum = rand(1, 47);
	} while(isDuplicate($randNum, $superLotto));
	
	array_push($superLotto, $randNum);
}

function isDuplicate($currNum, $lottoArray) {
	foreach ($lottoArray as $num) {
		if ($currNum == $num) {
			return TRUE;
		}
	}
	return FALSE;
}

?>