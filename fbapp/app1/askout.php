<?
$userid="'".$_POST['askoutuserid']."'";
$matcheduseridvar="'".$_POST['matcheduserid']."'";
$funtodo=$_POST['funto'];
$gender="'".$_POST['gen']."'";
$con = mysql_connect("localhost","abhaysr1","abhay07071993");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
if(isset($_POST['funto']))
{
if($funtodo=='delete')
{
$updatequeryfirst=mysql_query("UPDATE askouttable SET notification = 'stop' WHERE username=$userid" );
if(!$updatequeryfirst)
echo (mysql_error());
else
echo ('deleted successfully');
}
else if($funtodo=='addnewuser')
{
$updatequeryfirst=mysql_fetch_array(mysql_query("SELECT username FROM askouttable WHERE username=$userid"));
echo(count($updatequeryfirst).'is the length of array');
if(count($updatequeryfirst)==2)
{
$updatequerysecond=mysql_query("UPDATE askouttable SET notification='' WHERE username = $userid");
if(!$updatequerysecond)
echo(mysql_error());
else
echo ('notification updated');
}

if(count($updatequeryfirst)==1)
{
$updatequerysecond=mysql_query("INSERT INTO askouttable (username,gender) VALUES ($userid,$gender)");
if(!$updatequerysecond)
echo(mysql_error());
else
echo ('new user inserted');
}
}
else
{
$matcheduseridvar="'".$_POST['matcheduserid'].",'";
$updatequeryfirst = mysql_query("UPDATE askouttable SET matcheduser=REPLACE(matcheduser,$matcheduseridvar,'') WHERE username=$userid");
$matcheduseridvar="'".$_POST['matcheduserid']."'";
$userid="'".$_POST['askoutuserid'].",'";
$updatequerysecond = mysql_query("UPDATE askouttable SET matcheduser=REPLACE(matcheduser,$userid,'') WHERE username=$matcheduseridvar");

if((!$updatequeryfirst)&&(!$updatequerysecond))
echo (mysql_error());
else
echo ('updation successful funtogiven');
}
}
else
{
$findrow=mysql_fetch_array(mysql_query("SELECT matcheduser FROM askouttable WHERE username=$userid"));
if(strpos((string)$findrow[0],$_POST['matcheduserid'].',')===false)
{
$updatequeryfirst = mysql_query("UPDATE askouttable SET matcheduser=CONCAT(matcheduser,$matcheduseridvar,',') WHERE username=$userid");
$updatequerysecond = mysql_query("UPDATE askouttable SET matcheduser=CONCAT(matcheduser,$userid,',') WHERE username=$matcheduseridvar");

if((!$updatequeryfirst)&&(!$updatequerysecond))
echo (mysql_error());
else
echo ('updation successful funto not given');
}
else
{
echo('matched user already exists');
}
}
?>