<? 
$username='"'.$_GET['username'].'"'; 
$userid = '"'.$_GET['userid'].'"'; 
$crushlist='"'.$_GET['list'].'"';
$con = mysql_connect("localhost","abhaysr1","abhay07071993");
//echo $username;
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
$finduserquery = mysql_query("SELECT USERID FROM appdata WHERE USERID=$userid");
if(mysql_num_rows($finduserquery)>0)
{
header('Location:app.php');
echo ('userfound<br>');
$updatequery=mysql_query("UPDATE appdata SET CRUSHLIST=$crushlist WHERE USERID=$userid");
if(!$updatequery)
die ('Invalid query :'.mysql_error());
else
{
header('Location:app.php');
echo('list updated of user'.$userid);
}
}
else
{
$insertquery=mysql_query("INSERT INTO appdata (USERID,USERNAME,CRUSHLIST) VALUES ($userid,$username,$crushlist)");
if(!$insertquery)
die ('Invalid query :'.mysql_error());
else
{
header('Location:app.php');
echo ('new user added');
}
}
?>