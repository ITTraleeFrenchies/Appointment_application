<?php
$select = file_get_contents('content.txt');
$lines = explode("\n", $select);
echo "Busy Times : <br>";
foreach($lines as $line){
	if(substr( $line, 0, 8 ) == "FREEBUSY" ){
		//echo $line."<br>";
		$dates = explode(":",$line);
		//echo $dates[1]."<br>";
		echo "Day : ".substr($dates[1],6,2)."/".substr($dates[1],4,2)."/".substr($dates[1],0,4).
		" Time : ".substr($dates[1],9,2).".".substr($dates[1],11,2)." - ".substr($dates[1],26,2).".".substr($dates[1],28,2)."<br>";
	}
}
?>