<?
$usersid = $_GET['userid'];

$con = mysql_connect("localhost","abhaysr1","abhay07071993");
if(!$con)
{
  die('Could not connect: ' . mysql_error());
}
mysql_select_db('abhaysr1_songdatabase',$con);
$row=mysql_query("SELECT * FROM appdata WHERE userid=$usersid");
if(mysql_num_rows($row)==0)
{
$crusharray=array();$newmatchcrush=array();
$botharray = array ('crushes' => $crusharray,'newmatchcrush' => $newmatchcrush);
echo json_encode($botharray);
}
else
{
	while($result=mysql_fetch_array($row))
	{
	$crusharray=explode(",",$result['crushlist']);
	array_pop($crusharray);
	$oldmatchcrush = explode(",",$result['mutualcrush']);
	}
	$matchedcrush=array();
	foreach ($crusharray as $value)
	{      
		$row = mysql_query("SELECT crushlist FROM appdata WHERE userid=$value");
		if(mysql_num_rows($row)==0)
		{}
		else
		{
			while($result=mysql_fetch_array($row))
				{
				$friendscrusharray=explode(",",$result['crushlist']);
				array_pop($friendscrusharray);
				}

			foreach($friendscrusharray as $crushvalue)
			{
				if($crushvalue == $usersid)
				{
				array_push($matchedcrush,$value);
				//echo(count($matchedcrush).'<br>');
				//echo ($value.' has mutual crush<br>');
				}
				
			}
	     
		}
	}
	$mutualcrushes = implode(",",$matchedcrush);
    if($mutualcrushes =='')
	mysql_query("UPDATE appdata SET mutualcrush='' WHERE userid=$usersid ");
	else
    mysql_query("UPDATE appdata SET mutualcrush=$mutualcrushes WHERE userid=$usersid ");
	$newmatchcrush = array_diff($matchedcrush,$oldmatchcrush);
		 
	$botharray = array ('crushes' => $crusharray,'newmatchcrush' => $newmatchcrush, 'oldmatchcrush' => $oldmatchcrush);
	//print_r($matchedcrush);
	echo json_encode($botharray);
	
}

?>