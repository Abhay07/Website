<?
$user='"'.$_POST['user'].'"';
$userscore=$_POST['userscore'];
$level=$_POST['level'];
$funto=$_POST['funtodo'];
$con = mysql_connect("localhost","abhaysr1","abhay07071993");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
$con = mysql_connect("localhost","abhaysr1","abhay07071993");
if(isset($userscore))
{
$row=mysql_fetch_array(mysql_query("SELECT score FROM puzzledata WHERE username=$user AND level=$level"));
if($row['score']>$userscore)
mysql_query("UPDATE puzzledata SET score=$userscore WHERE username=$user AND level=$level ");
else if(count($row)==1)
mysql_query("INSERT INTO puzzledata (username,score,level)VALUES ($user,$userscore,$level)");
else
echo 'Highscore not changed';
echo(count($row).'is the found row');
}
else
{
$row=mysql_query("SELECT * FROM puzzledata WHERE level=$level ORDER BY score");
$userdata=array();
$dataarray=array();
while($result=mysql_fetch_array($row))
{
$userdata['name']=$result['username'];$userdata['score']=$result['score'];
$dataarray[]=$userdata;
}
echo json_encode($dataarray);
}
?>