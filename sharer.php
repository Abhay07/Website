<!DOCTYPE html>
<html lang='en'>

<head>
    <style>
    body {
        width: 100vw;
        min-height: 200px;
    }
    </style>
    <title><?php echo $_GET["title"] ?></title>
    <meta charset='UTF-8'>
    <meta property='fb:app_id' content='474834992901396' />
    <meta property='og:title' content =	'<?php echo $_GET["title"] ?>' />
    <meta property='og:site_name' content='quizhop.net/back/sharer.php' />
    <meta property='og:description' content='I invite you to this test. Click here to generate your result now!' />
    <meta property='og:url' content='http://quizhop.net/back/sharer.php' />
    <meta property='og:type' content='website' />
    <meta property='og:image' content='https://i.imgur.com/<?php echo $_GET["img"] ?>.jpg' />
    <meta property='og:image:type' content='image/jpg'>
    <meta property='og:image:width' content='800'>
    <meta property='og:image:height' content='420'> </head>

<body style="text-align: center;">
	Loading...

</body>
<script aync>
var quizId = '<?php echo $_GET["id"] ?>';
if (quizId) { 
	window.location.href = 'http://quizhop.net/#!/quiz/' + quizId; 
} 
else { 
	window.location.href = 'http://quizhop.net' 
}
</script>

</html>