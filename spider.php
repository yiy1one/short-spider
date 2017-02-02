<?php
	$url = $_POST['url'];
	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $url);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
	curl_setopt($ch,CURLOPT_HEADER,0);

	$output = curl_exec($ch);

	if($output === FALSE ){
		echo "CURL Error:".curl_error($ch);
	}

	curl_close($ch);
	echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />";
	echo "<div id='postlist' class='pl bm'>";
	$output_1 = explode('<div id="postlist" class="pl bm">',$output);
	$output_2 = explode('<div id="postlistreply" class="pl">',$output_1[1]);
	echo $output_2[0];
	echo '<div id="postlistreply" class="pl"><div id="post_new" class="viewthread_table" style="display: none"></div></div></div>';
	
	
	//echo $output;
?>