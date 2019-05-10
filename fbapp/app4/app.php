<html>
<head>
<title>BetSome</title>
<link rel="stylesheet" href="app.css" />
</head>
<body>
<div id="menu_container">
<div class="menu_div" id="menu_div_1"><span class="menu_span"></span></div><div class="menu_div" id="menu_div_2"><span class="menu_span"></span></div><div class="menu_div" id="menu_div_3"><span class="menu_span"><br><div id="noti_div"></div></span></div><div class="menu_div" id="menu_div_4"><span class="menu_span">COINS<br><div id="coin_div"><div class="coin_box" id="coin_text">100</div><div class="coin_box" id="coin_img"><img src="images/coins.png"/></div></div></span></div><div class="menu_div" id="menu_div_5"><span class="menu_span"></span></div><div class="menu_div" id="menu_div_6"><span class="menu_span"></span></div>
</div>
<div id="main_container">

<div id="main_btns_container">
<div class="main_btns" id="main_btn_1">BET THE WIT</div><div class="main_btns" id="main_btn_2">MONOPOLY</div>
</div>

<div id="main_contents">

<div id="left_block" class="blocks">
<table border="0" title='CRICKET'>
<tr><th><span class="sports_logo"><img src="images/logos/cricket_logo.png"/></span><span class="sports_logo">CRICKET</span></th><th></th><th></th></tr>
</table><p>
<table border="0" title='FOOTBALL'>
<tr><th><span class="sports_logo"><img src="images/logos/cricket_logo.png"/></span><span class="sports_logo">FOOTBALL</span></th><th></th><th></th><th></th><th></th></tr>
</table>
</div>

<div id="right_block" class="blocks"></div>
</div>
<div id="bet_div">
<div id="bet_div_1"><span class="bet_span_1"><img src="images/logos/INDIA.jpg"></span><span class="bet_span_2">INDIA</span></div>
<div id="bet_div_2"></div>
<div id="bet_div_3"><span class="bet_span_1">BALANCE</span><span class="bet_span_2">100</span></div>
<div id="bet_div_4"><span class="bet_span_1">BET AMOUNT</span><span class="bet_span_2"><input type="text" id="bet_amt_input"/></span></div>
<div id="bet_div_5"><span class="bet_span_1">LEFT BALANCE</span><span class="bet_span_2">100</span></div>
<div id="bet_div_6"><span class="bet_span_1"><a href="#" id="bet_confirm_btn"><img src="images/bet_btn.png"/></a></span><span class="bet_span_2"><a href="#"id="bet_cancel_btn"><img src="images/bet_cancel.png"/></a></span></div>
</div>

<div id="dialog_box">
<div id="dialog_box_1">CHANGE BET</div>
<div id="dialog_box_2"></div>
<div id="dialog_box_3"><span class="bet_span_1"><span class="dialog_box_btn" id="dialog_box_yes_btn">YES</span></span><span class="bet_span_2" id="dialog_box_no_btn"><span class="dialog_box_btn">NO</span></span></div>
</div>

</div>
<div id="back_cover"><div id="saving_div">SAVING BETS<br><img src="images/loading.gif"/></div></div>
</body>

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="scripts/jcook.js"></script>
<script>
var totalcoins = currentbetonthismatch = betcoins = totalbetresults = amounttosave = 0;
var clickedteam, betteam, totalbet, rowclass, currentrow, amountwonorlost, newbetresults;
var bettingamount='';

console.log($('body').css('width'));
$('#noti_div,#back_cover,#saving_div').hide();

var otherfunctions=function()
{
$('tr.finalised,tr.userfinalised, table tr :nth-child(5),tr.unbetted td.td_3 span.td_3_span:nth-child(2)').hide();
$('.span_cell_4').click(function()
{   $('#back_cover').show();
	clickedteam=$(this);
	if(clickedteam.parent().parent().attr('class')=='unbetted')
	{
		$('#bet_div_3 span.bet_span_2').html(totalcoins);
		betteam=$(this).siblings('.span_cell_2').html(); 
		$('#bet_div').show();
		$('#bet_div_1 span.bet_span_2').html(betteam);
		$('#bet_div_1 span.bet_span_1 img').attr('src','images/logos/'+betteam+'.jpg');
		$('#bet_amt_input').val(0);
		$('#bet_div_5 span.bet_span_2').html(totalcoins);
	}
	else if(clickedteam.parent().parent().attr('class')=='betted')
	{    
		betteam=$(this).siblings('.span_cell_2').html(); 
		currentbetonthismatch=parseInt($(this).parent().siblings('.td_3').children('span:first-child').html());
		$('#dialog_box').show();
		$('#dialog_box_2').html('You have already placed the bet on this match<br>Do you want to reset your bet on it ?');
	}
	else
	{
	console.log('Betting finished');
	}
});

$('.cancel_bet_span').click(
function()
{
clickedteam=$(this);
currentbetonthismatch=parseInt($(this).parent().siblings('.td_3').children('span:first-child').html());
$('#back_cover').show();
$('#dialog_box').show();
$('#dialog_box_2').html('Are you sure you want to remove bet from this match?');
}
);


};

$('#menu_div_1').click(function()
{   $('.menu_div').attr('title','');
    $(this).attr('title','active_menu');
	$('tr.unbetted,tr.betted').show();
	$('tr.userfinalised').hide();
	$('span.cancel_bet_span,table tr :nth-child(5)').hide();
	$('table').css('width','90%');
});

$('#menu_div_2').click(function()
{   
    $('.menu_div').attr('title','');
    $(this).attr('title','active_menu');
	$('tr.unbetted,tr.userfinalised,.td_5 span:nth-child(2)').hide();
	$('tr.betted,table tr :nth-child(5),span.cancel_bet_span').show();
	$('table').css('width','90%');
});

$('#menu_div_3').click(function()
{   
    $('.menu_div').attr('title','');
    $(this).attr('title','active_menu');
	$('tr.userfinalised').show();
	$('table tr :nth-child(5),.td_5 span:nth-child(2)').show();
	$('tr.betted,tr.unbetted,span.cancel_bet_span').hide();
	$('table').css('width','100%');
	$.setCookie("betnumbers",totalbetresults);
	if(prevwonamount==amounttosave)
	console.log('no change in won amount');
	else
	{ 
	totalcoins+=amounttosave;
	$('#coin_text').html(totalcoins);
	$.post('placebet.php',{userid:2147483647,coinsleft:totalcoins,prevbets:amounttosave},function(data){console.log(data);$('#saving_div,#back_cover').hide();});
	}
	
});




$.post('matchdata.php',function(data)
{  
	$.each(JSON.parse(data),function(index,value)
	{
	if(value.WON!='')
	{rowclass='finalised';wonteam=value.WON}
	else
	{rowclass='unbetted';wonteam="no_team_yet"}
	$('table[title="'+value.SPORTS+'"]').append('<tr class='+rowclass+' title="MATCH'+value.MATCH+'" name="'+wonteam+'"><td class="td_1"><span class="span_cell_1"><img src="images/logos/'+value.TEAMA+'.png"/></span><span class="span_cell_2">'+value.TEAMA+'</span><span class="span_cell_3">x'+value.BETTEAMA/10+'</span><span class="span_cell_4">BET</span></td><td class="td_2"><span class="span_cell_1"><img src="images/logos/'+value.TEAMB+'.png"/></span><span class="span_cell_2">'+value.TEAMB+'</span><span class="span_cell_3">x'+value.BETTEAMB/10+'</span><span class="span_cell_4">BET</span></td><td class="td_4">'+value.DATEOFMATCH+'</td><td class="td_3"><span class="td_3_span"></span><span class="td_3_span"><img src="images/coins.png"</span></td><td class="td_5"><span class="cancel_bet_span" title="Cancel bet"></span><span></span></td></tr>');
    
	if(index==(JSON.parse(data).length-1))
	userpreviousbets();
	});
	
	
});

$('#bet_div,#dialog_box').hide();

$('#main_btn_1').click(function()
{
	$('#main_btns_container').hide();
	$('#menu_div_1 span').html('HOME');$('#menu_div_2 span').html('YOUR BETS');$('#menu_div_3 span').prepend('RESULTS');/*$('#menu_div_4 span').html('COINS');*/$('#menu_div_5 span').html('GAME');$('#menu_div_6 span').html('SAVE<br>BETS');
});



$('#menu_div_6 span').click(function()
{   $('#back_cover,#saving_div').show();
    bettingamount='';
	$('tr.betted,tr.userfinalised').each(function()
	{
	 if(bettingamount=='')
	 bettingamount=$(this).attr('title')+'-'+$(this).children().children('span[title="You\'ve betted on this team"]').siblings('.span_cell_2').html()+'-'+$(this).children('.td_3').children('span:first-child').html()+',';
	 else
	 bettingamount+=$(this).attr('title')+'-'+$(this).children().children('span[title="You\'ve betted on this team"]').siblings('.span_cell_2').html()+'-'+$(this).children('.td_3').children('span:first-child').html()+',';
	});
	console.log(bettingamount);
	$.post('placebet.php',{userid:2147483647,betsplaced:bettingamount,coinsleft:totalcoins},function(data){console.log(data);$('#saving_div,#back_cover').hide();});
});

$('#bet_cancel_btn').click(function()
{
	if(clickedteam.parent().parent().attr('class')=='betted')
	{
		clickedteam.parent().parent().attr('class','unbetted');
		clickedteam.parent().siblings('.td_3').children('span:first-child').html('');
		clickedteam.parent().siblings('.td_3').children('span:nth-child(2)').hide();
		clickedteam.parent().parent().children().children('.span_cell_4').attr('title','');
		$('#coin_text').html(totalcoins);

	}
	$('#bet_div,#back_cover').hide();

});

$('#bet_confirm_btn').click(function()
{
	if(($('#bet_amt_input').val()>0)&&($('#bet_amt_input').val()%1==0))
	{
	totalcoins=totalcoins-betcoins;
	$('#bet_div,#back_cover').hide();
	$('#coin_text').html(totalcoins);
	clickedteam.attr('title','You\'ve betted on this team');
	clickedteam.parent().siblings('.td_3').children('span:first-child').html(betcoins);
	clickedteam.parent().siblings('.td_3').children('span:nth-child(2)').show();
	clickedteam.parent().parent().attr('class','betted');
	}
	else
	alert('Please bet a valid amount');
});


$('#dialog_box_yes_btn').click(function()
{   
    if(clickedteam.attr('class')=='span_cell_4')
	{
	totalcoins+=currentbetonthismatch;
	$('#dialog_box').hide();$('#bet_div').show();
	$('#bet_div_3 span.bet_span_2').html(totalcoins);
	$('#bet_div_1 span.bet_span_2').html(betteam);
	$('#bet_div_1 span.bet_span_1 img').attr('src','images/logos/'+betteam+'.jpg');
	$('#bet_amt_input').val(0);
	$('#bet_div_5 span.bet_span_2').html(totalcoins);
	}
	else
	{
	totalcoins+=currentbetonthismatch;
	clickedteam.parent().parent().attr('class','unbetted');
	clickedteam.parent().siblings('.td_3').children('span:first-child').html('');
	clickedteam.parent().siblings('.td_3').children('span:nth-child(2)').hide();
	clickedteam.parent().parent().children().children('.span_cell_4').attr('title','');
	$('#dialog_box,#back_cover,tr.unbetted').hide();
	$('#coin_text').html(totalcoins);
	
	}

});

$('#dialog_box_no_btn').click(function(){$('#dialog_box,#back_cover').hide();});

$('#bet_amt_input').keyup(function(event)
{
	if(($(this).val().match(/^\d+$/))||($(this).val()==''))
	{
		betcoins=$(this).val();
		if(betcoins>totalcoins)
		{
		$(this).val(betcoins.slice(0,betcoins.length-1));
		betcoins=$(this).val();
		}
		$('#bet_div_5 span.bet_span_2').html(totalcoins-betcoins);
	}
	else
	{
	$(this).val(0);
	$('#bet_div_5 span.bet_span_2').html(totalcoins);
	}
});




var userpreviousbets=function()
{  
	$.post('getuserdata.php',function(data)
	{   
		data=JSON.parse(data);
		totalcoins=parseInt(data.coins);
		prevwonamount = parseInt(data.prevbets);
		totalbet=data.bets.split(',');
		totalbet.pop();
		console.log(totalbet);
		$.each(totalbet,function(index,value)
		{
		
		    $('tr[title="'+value.split('-')[0]+'"]').children('.td_3').children('span:first-child').html(value.split('-')[2]);
			$('tr[title="'+value.split('-')[0]+'"]').children('.td_3').children('span:nth-child(2)').show();
			$('tr[title="'+value.split('-')[0]+'"]').children().children('span:contains("'+value.split('-')[1]+'")').siblings('.span_cell_4').attr('title','You\'ve betted on this team');
			if($('tr.finalised[title="'+value.split('-')[0]+'"]').length>0)
			{   totalbetresults+=1;
				$('tr.finalised[title="'+value.split('-')[0]+'"]').attr('class','userfinalised');
				currentrow=$('tr.userfinalised[title="'+value.split('-')[0]+'"]');
				currentrow.parent().children(':first-child').append('<th></th>');
				amountwonorlost=parseFloat(currentrow.children().children("span[title='You\'ve betted on this team']").siblings('.span_cell_3').html().split('x')[1])*value.split('-')[2];
		        console.log(amountwonorlost+'is the amount');
				currentrow.children().children('span:contains("'+currentrow.attr('name')+'")').parent().css('background-color','rgba(0,0,0,0.5)');
				if(currentrow.attr('name')==(value.split('-')[1]))
				{
					currentrow.children('.td_5').children('span:nth-child(2)').html('WON '+amountwonorlost);
					currentrow.children('.td_5').children('span:nth-child(2)').css('background-color','rgba(0,128,0,0.8)');
					amounttosave+=amountwonorlost;
				}
				else
				{
					currentrow.children('.td_5').children('span:nth-child(2)').html('LOST '+amountwonorlost);
					currentrow.children('.td_5').children('span:nth-child(2)').css('background-color','rgba(255,0,0,0.5)');
					amounttosave-=amountwonorlost;
				}
			}
			else
			$('tr[title="'+value.split('-')[0]+'"]').attr('class','betted');
			
		});
		$('#coin_text').html(totalcoins);
		$('#bet_div_3 span.bet_span_2').html(totalcoins);
		if($.getCookie("betnumbers")==null)
		$.setCookie("betnumbers",0);
		newbetresults=totalbetresults-$.getCookie("betnumbers");
		if(newbetresults!=0)
		{$('#noti_div').show();$('#noti_div').html(newbetresults);}
		console.log(totalbetresults);
		otherfunctions();
		
	});
};

</script>

</html>