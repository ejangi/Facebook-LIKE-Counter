<?php
$id = 0;

$gid = $_GET['id'];
//$gid = preg_replace('/[^0-9a-z:\/_]/i', '', $gid);

if($gid)
	$id = $gid;
	
if(!$id):
?>
{ "data": [] }
<?php

else:
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($ch, CURLOPT_POST, FALSE);
	curl_setopt($ch, CURLOPT_URL, 'https://graph.facebook.com/?id='.$id);

	//make the request
	$result = curl_exec($ch);
	echo $result;
endif;
?>