<?php


	$msg=$_GET['msg'];

	$url= "http://course1bluemix.au-syd.mybluemix.net/chatbot?msg=";
	$url = $url.$msg;
	
	echo "User Says ->".$msg;
	//echo $url;



	//$r = new HttpRequest($url, HttpRequest::METH_GET);
	$curl = curl_init($url);
	curl_setopt ($curl, CURLOPT_URL, $url);
    curl_setopt ($curl, CURLOPT_HEADER, 0);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	$r = curl_exec($curl);
	#echo $r;

	$array=json_decode($r,true);

	echo "<br>";
	echo $array['response']."<- Janani says";
?>