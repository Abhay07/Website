<?php
$starttime = microtime(true);
$POSTData = json_decode(file_get_contents('php://input'),true);
$title = $POSTData["title"];
$imgURL = $POSTData["image"]; 
$name = rand();
$imgURL = str_replace('data:image/jpeg;base64,', '', $imgURL);
$imgURL = str_replace(' ', '+', $imgURL);
$data = base64_decode($imgURL);
$imageFile = "share/".$name.".jpg"; 
$success = file_put_contents($imageFile,$data);
$myFile = "share/$name.html"; // or .php   
$fh = fopen($myFile, 'w'); // or die("error");  
$stringData = "<!DOCTYPE html> <html lang='en'> <head><style>body{width:100vw;min-height:200px;}</style> <title>Which Character you look like in GOT ?</title> <meta charset='UTF-8'> <meta property='fb:app_id' content='302184056577324' /> <meta property='og:title' content='$title' /> <meta property='og:site_name' content='abhaysrivastav.net/Website/back/share.html' /> <meta property='og:description' content='I invite you to this test. Click here to generate your result now!' /> <meta property='og:url' content='http://abhaysrivastav.net/Website/back/share/$name.html' /> <meta property='og:type' content='website' /> <meta property='og:image' content='http://abhaysrivastav.net/Website/back/share/$name.jpg' /> <meta property='og:image:type' content='image/jpg'> <meta property='og:image:width' content='800'> <meta property='og:image:height' content='420'> </head> <body>Loading...</body><script>var quizId = window.location.href.split('=')[1]; debugger;if(quizId!=undefined){window.location.href='http://abhaysrivastav.net/Website/#!/quiz/'+quizId;} else{window.location.href='http://abhaysrivastav.net/test'}</script></html>";   
if(!fwrite($fh, $stringData)){
	die ("Error occurred");
}
else{
	$endtime = microtime(true);
	$timediff = $endtime - $starttime;
	echo $name;
}
fclose($fh);
?>