<?php 
	$conn = new mysqli("localhost","root","","chatbot");
	$string = file_get_contents("intents.json");
	$json_a = json_decode($string, true);
	$val = $_POST['data'];

	$val2 = mb_strtolower($val);
	$val2 = preg_replace('/[-?]/', '', $val2);
	$rval = [];

	$ip_add = $_SERVER['REMOTE_ADDR'];
	$sql = "INSERT INTO chathistory (history, ipaddress) VALUES ('$val2', '$ip_add')";
	$conn->query($sql);

	foreach ($json_a as $value) {
		foreach ($value as $dd) {
		    // print_r($dd['patterns']);

		  $ch = preg_grep('/^'.$val2.'*$/',$dd['patterns']);
		  if($ch){
		    $six = sizeof($dd['responses']);
		    $randselect = rand(0, $six-1);
		    $rval = $dd['responses'][$randselect];
		    
		  }
		  
		}
	}
	$log['text'] = $rval; 
	$log['yourmsg'] = $val;
	echo json_encode($log);
	
?>