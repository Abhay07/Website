<?
$playerid=$_GET['playerid'];
?>
<html>
<head>
<title>BetSome Business game</title>
<link rel="stylesheet" href="game.css"/>
</head>
<body>
<div id="game_wrapper">
<div class="place_blocks" id="block_one"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_two"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_three"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_four"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_five"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_six"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_seven"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_eight"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_nine"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_ten"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_eleven"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_twelve"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_thirteen"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_forteen"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_fifteen"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_sixteen"><div class="house_block"></div><div class="your_block"></div></div><div class="place_blocks" id="block_chance"></div><div class="place_blocks" id="block_jail"></div><div class="place_blocks" id="block_discount"></div><div class="place_blocks" id="block_start"></div>
</div>

<div id="game_place">
<div id="game_place_main">
<div id="game_place_one"></div>
<div id="game_place_two">
<img class="place_img" id="image_one" src="images/game/places/goa.jpg" />
<img class="place_img" id="image_two" src="images/game/places/mum.jpg" />
<img class="place_img" id="image_three" src="images/game/places/ngp.jpg" />
<img class="place_img" id="image_four" src="images/game/places/jap.jpg" />
<img class="place_img" id="image_five" src="images/game/places/dlh.jpg" />
<img class="place_img" id="image_six" src="images/game/places/sri.jpg" />
<img class="place_img" id="image_seven" src="images/game/places/lko.jpg" />
<img class="place_img" id="image_eight" src="images/game/places/noi.jpg" />
<img class="place_img" id="image_nine" src="images/game/places/gwh.jpg" />
<img class="place_img" id="image_ten" src="images/game/places/kol.jpg" />
<img class="place_img" id="image_eleven" src="images/game/places/rkl.jpg" />
<img class="place_img" id="image_twelve" src="images/game/places/ptn.jpg" />
<img class="place_img" id="image_thirteen" src="images/game/places/bng.jpg" />
<img class="place_img" id="image_forteen" src="images/game/places/hyd.jpg" />
<img class="place_img" id="image_fifteen" src="images/game/places/chn.jpg" />
<img class="place_img" id="image_sixteen" src="images/game/places/thp.jpg" />
<img class="place_img" id="image_chance" src="images/game/places/chance.png" />
<img class="place_img" id="image_jail" src="images/game/places/jail.png" />
<img class="place_img" id="image_discount" src="images/game/places/discount.png" />
</div>
<div id="game_place_three"></div>
<div id="game_place_four">
<div id="game_place_four_text_div"></div>
<div class="game_place_four_inside"><div class="game_place_four_inside_upper" id="game_place_four_inside_upper_one"></div><div class="game_place_four_inside_lower" id="game_place_four_inside_lower_one"></div></div>
<div class="game_place_four_inside"><div class="game_place_four_inside_upper" id="game_place_four_inside_upper_two"></div><div class="game_place_four_inside_lower" id="game_place_four_inside_lower_two"></div></div>
<div class="game_place_four_inside"><div class="game_place_four_inside_upper" id="game_place_four_inside_upper_three"></div><div class="game_place_four_inside_lower" id="game_place_four_inside_lower_three"></div></div>
</div>
<div id="game_place_five">
<div class="game_place_five_inside"><div id="buy_div" title="BUY THIS PLACE">BUY</div></div>
<div class="game_place_five_inside"><div id="skip_div" title="SKIP">SKIP</div></div>
</div>
<div id="confirm_btn">OK</div>
</div>
</div>

<div id="game_roll"></div>
<div id="dice_val">
<img src="images/game/dices/one.png" class="dice_div_img" id="dice_val_1"/>
<img src="images/game/dices/two.png" class="dice_div_img" id="dice_val_2"/>
<img src="images/game/dices/three.png" class="dice_div_img" id="dice_val_3"/>
<img src="images/game/dices/four.png" class="dice_div_img" id="dice_val_4"/>
<img src="images/game/dices/five.png" class="dice_div_img" id="dice_val_5"/>
<img src="images/game/dices/six.png"class="dice_div_img" id="dice_val_6" />
</div>
<div id="turn_wait_text" class="turn_divs">OPPONENT<br>TURN</div>
<div id="turn_div" class="turn_divs">YOUR TURN</div>

<div id="userplayer" class="player_div">YOU</div>
<div id="opponentplayer" class="player_div">OPPONENT</div>
<div id="back_cover"></div>

<div id="confirm_box">
<div class="confirm_box_lower">YOU DON'T HAVE ENOUGH COINS TO BUY THIS PLACE. SKIP TO NEXT MOVE.</div>
<div class="confirm_box_lower">
<div id="confirm_box_btn">OK</div>
</div>
</div>
</div>

<div id="coin_main_div">
	<div class="coin_parent_div">
		<div class="coin_inner_div">
			<div id="your_coin_count" class="coin_div_class">YOUR COINS: 500</div><div class="coin_div_class"><img class="coin_image" src="images/coins.png"/></div>
		</div>
		<div class="coin_inner_div">
			<div id="your_total_asset" class="total_asset_div">YOUR TOTAL ASSET: &#8377; 500</div>
		</div>
	</div>

	<div class="coin_parent_div">
		<div class="coin_inner_div">
			<div id="opponent_coin_count" class="coin_div_class">OPPONENT COINS: 500</div><div class="coin_div_class"><img class="coin_image" src="images/coins.png"/></div>
		</div>
		<div class="coin_inner_div">
			<div id="opponent_total_asset" class="total_asset_div">OPPONENT TOTAL ASSET: &#8377; 500</div>
		</div>
	</div>
</div>

<div id="last_activity_head">LAST ACTIVITY</div>
<div id="last_activity_div"></div>
<div id="build_dialog">
<div class="build_dialog_inside">HOUSE BUILDING COST &#8377; 50</div>
<div class="build_dialog_inside">YOU ALREADY HAVE 0 HOUSES HERE</div>
<div class="build_dialog_inside"><div class="build_dialog_inside_inside">NUMBER OF HOUSES</div><div class="build_dialog_inside_inside"><input type="text" id="build_house_input"  ></div></div>
<div class="build_dialog_inside"><div class="build_dialog_inside_inside">TOTAL COST</div><div class="build_dialog_inside_inside"></div></div>
<div class="build_dialog_inside"><div class="build_dialog_inside_inside">REMAINING BALANCE</div><div class="build_dialog_inside_inside"></div></div>
<div class="build_dialog_inside"><div class="build_dialog_inside_inside"><div class="build_dialog_btn" id="build_confirm_btn">BUILD</div></div><div class="build_dialog_inside_inside"><div class="build_dialog_btn" id="build_cancel_btn">CANCEL</div></div></div>
</div>

</body>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script>

$(document).ready(function()
{
$('.house_block').attr('title','YOU HAVE 0 HOUSES HERE');
$('.place_img,.dice_div_img,#game_place_five,#back_cover,#confirm_box,.your_block,.house_block,#confirm_btn,#turn_wait_text').hide();
$('.player_div').css('left',($(document).width()/2)-249.5);
console.log(parseInt($('.player_div').css('top')));
var t,m,hoveredelement,discgiven,lastactvar,rollallowed,userbought,newhousetitle,coingiven,jailduration,div_var,opponenttotalcoin,opponenttotalasset;
var pi=<? echo $playerid;?>;
var lastm;
var coincount=500;
var totalasset=500;
var ownedblocks;

rollallowed='yes';
 
$('.your_block').attr('title','You own this place');
var getopponentmove= function()
{
$.post
('getmove.php',{player1:<? echo $playerid; ?>},
    function(data)
    {   
	    data=JSON.parse(data);
        if(data.lastpos!=0)
        {
		console.log(data);
        lastactvar=data.lastactivity;
		opponenttotalcoin=data.totalcoin;
		opponenttotalasset=data.totalasset;
        $.post('usermove.php',{playerid:<? echo $playerid;?>,moveshw:'yes'},function(){clearInterval(t);});
        roll_dice_fun($('#opponentplayer'),parseInt(data.lastpos));
        }
        if(data.lastpos==0)
        {
        console.log('no moves yet');
        }
    }
);
};

if(pi==12346)
{
t=setInterval(getopponentmove,5000);
rollallowed='no';
}
else
{rollallowed='yes';$('#turn_div').show();}


var roll_dice_fun = function(a,r)
{   
    $('.dice_div_img').hide();
    $('#game_roll').show();
    $('#game_roll').animate({top:'-=200'},1000,function()
    {   
        $('#game_roll').css({'top':'500px'});
        $('#game_roll').hide();
        
        switch(r)
        {
		case 8:
		r=0;
        case 1:
        $('#dice_val_1').show();
        break;
        case 2:
        $('#dice_val_2').show();
        break;
        case 3:
        $('#dice_val_3').show();
        break;
        case 4:
        $('#dice_val_4').show();
        break;
        case 5:
        $('#dice_val_5').show();
        break;
        case 6:
        $('#dice_val_6').show();
        break;
		case 15:
		$('#dice_val_6').show();
        }
        player_move(a,r);
        
    });
};

var player_move = function(b,c) 
       {   
	        if(c==0)
             {   
				$('.place_blocks').each(
				function()
				{
					if(((b.offset().left-$(this).offset().left)==25.5)&&((b.offset().top-$(this).offset().top)==25.5))
					{
					hoveredelement=$(this).attr('id').split('_')[1];
					switch(hoveredelement)
				{
				case 'one' :
				div_var = 'GOA,130,20,20';
				break;
				case 'two' :
				div_var = 'MUMBAI,280,35,20';
				break;
				case 'three' :
				div_var = 'NAGPUR,140,15,10';
				break;
				case 'four' :
				div_var = 'JAIPUR,150,20,15';
				break;
				case 'five' :
				div_var = 'DELHI,300,40,20';
				break;
				case 'six' :
				div_var = 'SRINAGAR,140,10,15';
				break;
				case 'seven' :
				div_var = 'LUCKNOW,240,15,10';
				break;
				case 'eight' :
				div_var = 'NOIDA,240,25,15';
				break;
				case 'nine' :
				div_var = 'GUWAHATI,150,15,15';
				break;
				case 'ten' :
				div_var = 'KOLKATA,220,15,10';
				break;
				case 'eleven' :
				div_var = 'ROURKELA,120,10,5';
				break;
				case 'twelve' :
				div_var = 'PATNA,130,10,5';
				break;
				case 'thirteen' :
				div_var = 'BANGALORE,230,30,20';
				break;
				case 'forteen' :
				div_var = 'HYDERABAD,250,25,15';
				break;
				case 'fifteen' :
				div_var = 'CHENNAI,250,30,15';
				break;
				case 'sixteen' :
				div_var = 'THIRUVANTAPURAM,230,20,10';
				break;
				};
				return false;
					}
				});
				
				 if(b.attr('id')=='userplayer')
				 {  
					if($('#block_'+hoveredelement+' .opponent_block').length!=0)
					{
						coingiven=parseInt(div_var.split(',')[2])+parseInt($('#block_'+hoveredelement+' .house_block').attr('title').slice(9,10));
						coincount-=(coingiven);
						totalasset-=coingiven;
						$('#your_total_asset').html('YOUR TOTAL ASSET: &#8377; '+totalasset);
						$('#your_coin_count').html('YOUR COINS: '+coincount);
						lastactvar='reached '+div_var.split(',')[0]+' and paid '+coingiven+' coins as rent to opponent for this place.</li>';
						$('#last_activity_div').prepend('<li>You '+lastactvar);
						clearInterval(t);
						$('.dice_div_img,#turn_div').hide();
						$('#turn_wait_text').show();
						$.post('usermove.php',{lastpos:lastm,playerid:<? echo $playerid;?>,lastact:lastactvar,playercoin:coincount,playerasset:totalasset},function(a)
						{
						t=setInterval(getopponentmove,5000);
						});
					}
					else
					{
					 $('#back_cover').show();
					 show_buy_dialog(b);
					}
				 }
				 else
				 {    
					   if(lastactvar.indexOf('bought')>=0)
						{ 
							$('#block_'+hoveredelement+' .your_block').attr('class','opponent_block');
							$('#block_'+hoveredelement+' .opponent_block').show();	
							$('#block_'+hoveredelement+' .opponent_block').attr('title','Opponent own this place');					
						}
						if(lastactvar.indexOf('built')>=0)
						{
						$('#block_'+hoveredelement+' .house_block').show();
						$('#block_'+hoveredelement+' .opponent_block').attr('title','Opponent has'+lastactvar.split('built ')[1].slice(0,1)+' houses here');	
						}
						if(lastactvar.indexOf('rent')>=0)
						{
						coingiven=parseInt(lastactvar.split('and paid ')[1].slice(0,2));
						coincount+=coingiven;
                        totalasset+=coingiven;		
						$('#your_total_asset').html('YOUR TOTAL ASSET: &#8377; '+totalasset);
						$('#your_coin_count').html('YOUR COINS: '+coincount);
						lastactvar=lastactvar.split('rent ')[0]+'rent to you for this place. </li>'
						}
						$('#last_activity_div').prepend('<li>Opponent Player '+lastactvar);
						$('#opponent_coin_count').html('OPPONENT COINS:'+opponenttotalcoin);
						$('#opponent_total_asset').html('OPPONENT TOTAL ASSET: '+opponenttotalasset);
						if(jailduration>0)
						{
						lastactvar='is in jail.</li>';
						clearInterval(t);
						$('.dice_div_img,#turn_div').hide();
						$('#turn_wait_text').show();;
						$.post('usermove.php',{lastpos:8,playerid:<? echo $playerid;?>,lastact:lastactvar,playercoin:coincount,playerasset:totalasset},function(a)
						{
						t=setInterval(getopponentmove,5000);
						});
						$('#last_activity_div').prepend('<li>You are in jail, wait for '+jailduration+' turns.</li>');
						jailduration--;
						}
						else
						{
						rollallowed='yes';
						$('.dice_div_img,#turn_div').hide();
						$('#turn_wait_text').hide();
						$('#game_roll').show();
						$('#turn_div').show();
					    }
						
						
	             }
			 }
            if(c>0)
            {   
                if((parseInt(b.css('top'))>77)&&(parseInt(b.css('top'))!=532))
                {
                    if(parseInt(b.css('left'))==parseInt(($(document).width()/2)-249.5))
                    b.animate({top:'-=91'},1000,function(){c--;player_move(b,c);});
                    else if(parseInt(b.css('left'))==parseInt(($(document).width()/2)+205.5))
                    b.animate({top:'+=91'},1000,function(){c--;player_move(b,c);});
                }
                else if(parseInt(b.css('top'))==77)
                {
                    if(parseInt(b.css('left'))<parseInt(($(document).width()/2)+205.5))
                    b.animate({left:'+=91'},1000,function(){c--;player_move(b,c);});
                    else if(parseInt(b.css('left'))==parseInt(($(document).width()/2)+205.5))
                    b.animate({top:'+=91'},1000,function(){c--;player_move(b,c);});
                }
                else if(parseInt(b.css('top'))==532)
                {
                    if(parseInt(b.css('left'))>parseInt(($(document).width()/2)-249.5))
                    b.animate({left:'-=91'},1000,function(){c--;player_move(b,c);});
                    else if(parseInt(b.css('left'))==parseInt(($(document).width()/2)-249.5))
                    b.animate({top:'-=91'},1000,function(){c--;player_move(b,c);});
                }
            }
        };
        
var show_buy_dialog = function(d)
{
         
            
            hover_down_fun(hoveredelement);
            $('#image_'+hoveredelement).show();
            if(['chance','discount'].indexOf(hoveredelement)>-1)
            $('#confirm_btn').show();
			else if($('#block_'+hoveredelement+' div.your_block').css('display')=='block')
			{
			$('#buy_div').html('BUILD');$('#skip_div').html('SKIP');$('#game_place_five').show();userbought='yes';
			}
            else if(hoveredelement=='jail')
            {$('#buy_div').html('PAY');$('#skip_div').html('WAIT');$('#game_place_five').show();}
            else
            {$('#buy_div').html('BUY');$('#skip_div').html('SKIP');$('#game_place_five').show();}
            return false;
            
        
    
};


var hover_down_fun = function(d)
{   
    $('#game_place_two').css('background','white');
	switch(d)
				{
				case 'one' :
				div_var = 'GOA,130,20,20';
				break;
				case 'two' :
				div_var = 'MUMBAI,280,35,20';
				break;
				case 'three' :
				div_var = 'NAGPUR,140,15,10';
				break;
				case 'four' :
				div_var = 'JAIPUR,150,20,15';
				break;
				case 'five' :
				div_var = 'DELHI,300,40,20';
				break;
				case 'six' :
				div_var = 'SRINAGAR,140,10,15';
				break;
				case 'seven' :
				div_var = 'LUCKNOW,240,15,10';
				break;
				case 'eight' :
				div_var = 'NOIDA,240,25,15';
				break;
				case 'nine' :
				div_var = 'GUWAHATI,150,15,15';
				break;
				case 'ten' :
				div_var = 'KOLKATA,220,15,10';
				break;
				case 'eleven' :
				div_var = 'ROURKELA,120,10,5';
				break;
				case 'twelve' :
				div_var = 'PATNA,130,10,5';
				break;
				case 'thirteen' :
				div_var = 'BANGALORE,230,30,20';
				break;
				case 'forteen' :
				div_var = 'HYDERABAD,250,25,15';
				break;
				case 'fifteen' :
				div_var = 'CHENNAI,250,30,15';
				break;
				case 'sixteen' :
				div_var = 'THIRUVANTAPURAM,230,20,10';
				break;
				};
    switch(d)
    {
    case 'one': case 'two': case 'three': case 'four': case 'five': case 'six': case 'seven': case 'eight': case 'nine': case 'ten': case 'eleven': case 'twelve': case 'thirteen': case 'forteen': case 'fifteen': case 'sixteen':
    $('.game_place_four_inside').show();
    $('#game_place_one').html(div_var.split(',')[0]);
	if(discgiven=='yes')
	{
	$('#game_place_three').html('DISCOUNT PRICE &#8377; '+String(parseInt(div_var.split(',')[1])-parseInt(div_var.split(',')[1]*0.2)));
	console.log(parseInt(div_var.split(',')[1])-parseInt(div_var.split(',')[1]*0.2));
	}
	else
    $('#game_place_three').html('&#8377; '+div_var.split(',')[1]);
    $('#game_place_four_inside_lower_one').html('&#8377; '+div_var.split(',')[2]);
    $('#game_place_four_inside_lower_two').html('&#8377; '+50);
    $('#game_place_four_inside_lower_three').html('&#8377; '+div_var.split(',')[3]);
    break;
    case 'chance':
    $('#game_place_one').html('CHANCE');
    $('#game_place_four_text_div').html('IF YOU REACH THIS BLOCK WITH ODD NUMBER THEN -50 , IF BY EVEN THEN +50');
    break;
    case 'jail': 
    $('#game_place_one').html('JAIL');
    $('#game_place_four_text_div').html('YOU CAN EITHER PAY BAIL OF 100 COINS OR WAIT FOR 2 CHANCES');
    break;
    case 'discount':
    $('#game_place_one').html('DISCOUNT CLUB'); 
    $('#game_place_four_text_div').html('YOU GET A DISCOUNT OF 20% ON THE NEXT PLACE YOU BUY');
    break;
    }
    
};

var hover_up_fun = function(d)
{
    $('#image_'+d).hide();
    $('#game_place_one,#game_place_three,#game_place_four_inside_upper_one,#game_place_four_inside_upper_two,#game_place_four_inside_upper_three').html('');
    $('#game_place_three,#game_place_four_text_div').html('');
    $('.game_place_four_inside,#game_place_five').hide();
    $('#game_place_two').css('background','#40b9ce');
};

$('.place_blocks').hover(
    function()
    {
    $('#image_'+$(this).attr('id').split('_')[1]).show();
    hoveredelement = $(this).attr('id').split('_')[1];
    hover_down_fun(hoveredelement);
    },
    function()
    {
    hoveredelement = $(this).attr('id').split('_')[1];
    hover_up_fun(hoveredelement);
    }
);


$('#game_roll').click(function()
{
if(rollallowed=='yes')
{
lastm=Math.floor(Math.random()*6+1);
roll_dice_fun($('#userplayer'),lastm);
rollallowed='no';
}
});

$('#confirm_box_btn').click(
function()
{
$('#confirm_box').hide();
$('#build_dialog').css('z-index','3');
}
);

$('#buy_div').click(function()
{
if(div_var.split(',')[1]>coincount)
$('#confirm_box').show();
else if(userbought=='yes')
{
$('#back_cover').css('z-index','2');
$('#build_dialog').show();
$('#build_dialog .build_dialog_inside:nth-child(2)').html($('#block_'+hoveredelement+' .house_block').attr('title'));
}
else if(discgiven=='yes')
{
$('#block_'+hoveredelement+' .your_block').show();
coincount-=parseInt(div_var.split(',')[1]-(0.02*div_var.split(',')[1]));
totalasset+=parseInt(0.02*div_var.split(',')[1]);
$('#your_total_asset').html('YOUR TOTAL ASSET: &#8377; '+totalasset);
$('#your_coin_count').html('YOUR COINS: '+coincount);
$('#confirm_box').hide();
$('#back_cover').hide();
hover_up_fun(hoveredelement);
lastactvar='Player 1 reached '+div_var.split(',')[0]+' and bought it with discount.</li>';
$('#last_activity_div').prepend(lastactvar);
discgiven='no'
}
else if (hoveredelement=='jail')
{
coincount-=100;
totalasset-=100;
$('#your_total_asset').html('YOUR TOTAL ASSET: &#8377; '+totalasset);
$('#your_coin_count').html('YOUR COINS: '+coincount);
$('#back_cover').hide();
hover_up_fun(hoveredelement);
lastactvar='Player 1 reached jail and paid the bail.</li>';
$('#last_activity_div').prepend(lastactvar);
}
else
{
$('#block_'+hoveredelement+' .your_block').show();
coincount-=parseInt(div_var.split(',')[1]);
console.log('your coins are'+coincount);
$('#your_coin_count').html('YOUR COINS: '+coincount);
$('#confirm_box').hide();
$('#back_cover').hide();
hover_up_fun(hoveredelement);
lastactvar='reached '+div_var.split(',')[0]+' and bought it.</li>';
$('#last_activity_div').prepend('<li>You '+lastactvar);
}
clearInterval(t);
$('.dice_div_img,#turn_div').hide();
$('#turn_wait_text').show();;
$.post('usermove.php',{lastpos:lastm,playerid:<? echo $playerid;?>,lastact:lastactvar,playercoin:coincount,playerasset:totalasset},function(a)
        {
        t=setInterval(getopponentmove,5000);
        });
		
});

$('#skip_div,#confirm_btn').click(function()
{
$('#confirm_btn').hide();
$('#back_cover').hide();
hover_up_fun(hoveredelement);
if(hoveredelement=='discount')
{
lastactvar='reached discount club and got discount of 20%.</li>';
$('#last_activity_div').prepend('<li>You '+lastactvar);
discgiven='yes';
}
else if(hoveredelement=='jail')
{
jailduration=2;
lastactvar='reached jail and chose for waiting.</li>'
$('#last_activity_div').prepend('<li>You '+lastactvar);
}
else if(hoveredelement=='chance')
{
if(5%2==0)
{
coincount+=50;
totalasset+=50;
$('#your_total_asset').html('YOUR TOTAL ASSET: &#8377; '+totalasset);
$('#your_coin_count').html('YOUR COINS: '+coincount);
lastactvar='reached chance by even number and got +50 points.</li>';
$('#last_activity_div').prepend('<li>You '+lastactvar);
}
else
{
coincount-=50;
totalasset-=50;
$('#your_total_asset').html('YOUR TOTAL ASSET: &#8377; '+totalasset);
$('#your_coin_count').html('YOUR COINS: '+coincount);
lastactvar='reached chance by odd number and lost -50 points.</li>';
$('#last_activity_div').prepend('<li>You '+lastactvar);
}
}
else
{
lastactvar='reached '+div_var.split(',')[0]+' and skipped.</li>';
$('#last_activity_div').prepend('<li>You '+lastactvar);
}
clearInterval(t);
$('.dice_div_img,#turn_div').hide();
$('#turn_wait_text').show();;
$.post('usermove.php',{lastpos:lastm,playerid:<? echo $playerid;?>,lastact:lastactvar,playercoin:coincount,playerasset:totalasset},function(a)
        {
        t=setInterval(getopponentmove,5000);
        });

});

$('#build_confirm_btn').click(
function()
{
if(($('#build_house_input').val()!=0)&&($('#build_house_input').val()!=''))
{
coincount-=($('#build_house_input').val()*50);
$('#your_coin_count').html('YOUR COINS: '+coincount);
$('#build_dialog').hide();
$('#back_cover').hide();
hover_up_fun(hoveredelement);
$('#block_'+hoveredelement+' .house_block').show();
newhousetitle=$('#block_'+hoveredelement+' .house_block').attr('title').slice(9,10);
if(parseInt(newhousetitle)==0)
lastactvar='reached '+div_var.split(',')[0]+' and built '+$('#build_house_input').val()+' houses on it.</li>';
else
lastactvar='reached '+div_var.split(',')[0]+' and built '+$('#build_house_input').val()+' more houses on it.</li>';
$('#block_'+hoveredelement+' .house_block').attr('title','You have '+(parseInt(newhousetitle)+parseInt($('#build_house_input').val()))+'houses here');
$('#last_activity_div').prepend('<li>You '+lastactvar);
clearInterval(t);
$('.dice_div_img,#turn_div').hide();
$('#turn_wait_text').show();
$.post('usermove.php',{lastpos:lastm,playerid:<? echo $playerid;?>,lastact:lastactvar,playercoin:coincount,playerasset:totalasset},function(a)
        {
        t=setInterval(getopponentmove,5000);
        });
$('#build_house_input').val('');
$('.build_dialog_inside:nth-child(4) .build_dialog_inside_inside:nth-child(2),.build_dialog_inside:nth-child(5) .build_dialog_inside_inside:nth-child(2)').html('');
$('#back_cover').css('z-index','1');
}
else
{
$('#confirm_box .confirm_box_lower:first-child').html('PLEASE ENTER A VALID NUMBER OF HOUSES TO BUILD');
$('#confirm_box').show();
$('#build_dialog').css('z-index','1');
}
});

$('#build_cancel_btn').click(function()
{
$('#build_dialog,#back_cover').hide();
hover_up_fun(hoveredelement);
$('#back_cover').css('z-index','1');
lastactvar='<li>You reached '+div_var.split(',')[0]+' and skipped.</li>';
$('#last_activity_div').prepend(lastactvar);
});

$('#build_house_input').keyup(function(event)
{
	if(($(this).val().match(/^\d+$/))||($(this).val()==''))
	{
		if($(this).val()*50<=coincount)
		{
		$('.build_dialog_inside:nth-child(4) .build_dialog_inside_inside:nth-child(2)').html($(this).val()*50+' &#8377;');
		$('.build_dialog_inside:nth-child(5) .build_dialog_inside_inside:nth-child(2)').html((coincount-($(this).val()*50))+' &#8377;');
		}
		else
		$(this).val($(this).val().slice(0,-1));
	}
	else
	{
	$(this).val(0);
	}
});

});
</script>
</html>