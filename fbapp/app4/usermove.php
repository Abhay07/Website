<?
$lastposition=$_POST['lastpos'];
$playerid=$_POST['playerid'];
$playercoins=$_POST['playercoin'];
$playerassets=$_POST['playerasset'];
$lastactivar='"'.$_POST['lastact'].'"';
$con = mysql_connect("localhost","abhaysr1","abhay0707");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
if(isset($_POST['moveshw']))
{
if($playerid==12345)
$playerid=12346;
else
$playerid=12345;
$selectquery = mysql_query("UPDATE usergame SET LASTDICEPOS=0,LASTACTIVITY='' WHERE userid = $playerid");
}
else
$selectquery = mysql_query("UPDATE usergame SET LASTDICEPOS=$lastposition,LASTACTIVITY=$lastactivar,TOTALASSET=$playerassets,TOTALCOIN=$playercoins WHERE userid = $playerid");


if(!$selectquery)
echo (mysql_error());
else
echo 'success';
?>