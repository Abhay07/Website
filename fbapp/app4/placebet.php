<?
$userid=$_POST['userid'];
$bets='"'.$_POST['betsplaced'].'"';
$leftcoins=$_POST['coinsleft'];
$amounttosave=$_POST['prevbets'];

$con = mysql_connect("localhost","abhaysr1","abhay0707");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);

if(isset($_POST['prevbets']))
$firstquery = mysql_query("UPDATE userbetdata SET COINS=$leftcoins,PREVBETS=$amounttosave WHERE USERID = 2147483647");
else
$firstquery = mysql_query("UPDATE userbetdata SET COINS=$leftcoins,BETS=$bets WHERE USERID = 2147483647");

if(!$firstquery)
echo (mysql_error());
else
echo ('successful');
?>