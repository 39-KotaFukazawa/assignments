<?php
	$fp = fopen("data.csv","r");
	flock($fp,LOCK_SH);
	while (!feof($fp)) {	
		$fp_str = fgets($fp);
		echo $fp_str;
	}
	flock($fp,LOCK_UN);
	fclose($fp);

	?>