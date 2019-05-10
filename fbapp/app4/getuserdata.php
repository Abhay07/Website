<?
$con = mysql_connect("localhost","abhaysr1","abhay0707");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
$selectquery = mysql_query("SELECT COINS,BETS,PREVBETS FROM userbetdata WHERE userid = 2147483647");
$row=mysql_fetch_array($selectquery);
$userdatas=array('coins'=>$row['COINS'],'bets'=>$row['BETS'],'prevbets'=>$row['PREVBETS']);
echo json_encode($userdatas);
?>