<?php
	// error_reporting(E_ALL);
	$redirect_rules = "";
	if (($handle = fopen("in.csv", "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	        $redirect_rules .= "location = " . parse_url($data[1],PHP_URL_PATH)  . " { return 301  " .  $data[3] . "; }\n" ;
	    }
	    fclose($handle);
	}

	file_put_contents("redirect-csv.conf",$redirect_rules);
	// var_dump($redirect_rules);
?>
