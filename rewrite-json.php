<?php
	// error_reporting(E_ALL);

	$serialized_data = file_get_contents('redirect.json');

	// var_dump($serialized_data);

	$arr_data = unserialize ($serialized_data);

	// print_r($decoded_data);
	// var_dump($arr_data);
	$redirect_rules = "";
	foreach ($arr_data as $src => $dest){
		 // echo $src ;
		  // echo $dest;
		$redirect_rules .= "location = " . $src  . " { return 301  " .  $dest . "; }\n" ;
	}

	file_put_contents("redirect-json.conf",$redirect_rules);

	// echo $redirect_rules;

?>
