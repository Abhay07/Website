<html>
<head>
<title>Jigsaw puzzle</title>
<link rel="stylesheet" href="app.css"/>
</head>
<body>
<div id="header">
Jumbled Pal
<img src="images/logo.png"/>

</div>
<div style="border:solid 1px black;height:60px;overflow:hidden">
<div style="float:left;margin-right:20px"><div class="fb-like" data-href="https://developers.facebook.com/docs/plugins/" data-width="100px" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
<div style="float:left"><a href="#" id="invite_btn">Invite Friends</a></div>
</div>
<div id="first_div">
Please Login by clicking through below button<p>
<!--fb login button starts-->
		<fb:login-button show-faces="true" width="200" max-rows="1"></fb:login-button>
<!--fb login button ends--> 
</div>
<div id="second_div">
<div id="best_time_div">
Best time for level : <n id="level_label"></n>
<table id="scoretable"></table>
</div>
<div id="time_div">
Your Time<p>
<n id="solvetimediv"></n><p>
<a href="#" id="restart_btn"><img src="images/restart.png"/></a>
</div>
<div id="image_container">
<div class="block"></div><div class="block"></div><div class="block"></div><div class="block"></div>
<div class="block"></div><div class="block"></div><div class="block"></div><div class="block"></div>
<div class="block"></div><div class="block"></div><div class="block"></div><div class="block"></div>
<div class="block"></div><div class="block"></div><div class="block"></div>
<img src="testing.jpg" id="test_img"/>
</div>

</div>
<div id="search_friend_div">
Select one friend<p>
<input type="text" id="tags" value="Type your friend's name in this box"><p>
</div>
<div id="level_div">
Select a level <p>
<div class="level_box" >Easy</div><div class="level_box">Medium</div><div class="level_box">Difficult</div>
</div>
<div id="finish_div">
Congratulations!!<p>
You solved the puzzle.<p>
<div class="finish_inputs" >Solve again</div><div class="finish_inputs" >Exit</div>
</div>
</body>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=598310780218634";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script>
window.fbAsyncInit = function() 
{
	FB.init
	({
	  appId      : 598310780218634,        // App ID
	  status     : true,           // check login status
	  cookie     : true,           // enable cookies to allow the server to access the session
	  xfbml      : true            // parse page for xfbml or html5 social plugins like login button below
	});
var solvetime=0;
var i=0;
var availableTags;
var emptybox_x=0,emptybox_y=100;
var randombox_var;
var oldrandombox_var;
var currentposition;
var imageurl;
var difficulty_level;
var level_name;
var game_timer;
var username;
var solvedblocks;

	FB.login(function(resp) 
	{	console.log(resp);
		if(resp.status==='connected')
		{
			FB.api('/me',{fields:'name'},function(data){username=data.name;});
			$('#first_div').hide();
			$('#level_div').css('visibility','visible');
			
			$('#invite_btn').click(function()
			{
			FB.ui({method:'apprequests',message:'Solve puzzles of your friends. Try this app.'},function(response){console.log(response);});
			});
			$('#restart_btn').click(function()
					{
					$('#second_div').hide();
					$('#level_div').show();
					$('#tags').css('color','#999999');$('#tags').val('Type your friend\'s name in this box');
					$('#image_container').css('background-image','url("images/loading.gif")');
					clearInterval(game_timer);
					solvetime=0;
				    i=0;
				    emptybox_x=0;emptybox_y=100;
					});
					
			$('.finish_inputs').click(function()
			{
				if($(this).html()=='Exit')	
				$('#finish_div').css('visibility','hidden');
				else if($(this).html()=='Solve again')	
				{
				$('#finish_div').hide();
				$('#second_div').hide();
				$('#level_div').show();
				$('#tags').css('color','#999999');$('#tags').val('Type your friend\'s name in this box');
				$('#image_container').css('background-image','url("images/loading.gif")');
				solvetime=0;
				i=0;
				emptybox_x=0;emptybox_y=100;
				}
			});
			
			$('.level_box').click(function()
			{   
				if($(this).html()=='Easy')
				{difficulty_level=8;level_name='EASY';$('#level_div').hide();}
				else if($(this).html()=='Medium')	
				{difficulty_level=15;level_name='MEDIUM';$('#level_div').hide();}
				else if($(this).html()=='Difficult')	
				{difficulty_level=25;level_name='DIFFICULT';$('#level_div').hide();}
				else
				console.log('no level selected');
				$('#search_friend_div').css('visibility','visible');
				$('#search_friend_div').show();
				$.post('getscore.php',{level:difficulty_level},function(data)
				{	
				   
					console.log(JSON.parse(data));
					$('#level_label').html(level_name+'<p>');
					$('#scoretable').html('');
					$.each(JSON.parse(data),function(index,value)
					{
					$('#scoretable').append('<tr><td>'+value.name+'</td><td>'+(Math.floor(value.score/60))+':'+(value.score%60)+' sec</td></tr>');
					});
				});
			});
			
				$('#tags').focus(function()
				{
				$('#tags').css('color','black');$('#tags').val('');
				});
				FB.api('/me/friends',{fields:'id,name'},function(response)
				{   availableTags=[];
					var obj={};
					response.data.forEach(
					function(item)
					{
					obj={};
					obj.label=item['name'];obj.value=item['id'];obj.image='https://graph.facebook.com/'+item['id']+'/picture?width=50&height=50';
					obj.description="Actor";
					availableTags.push(obj);
					});
					
					$("#tags").autocomplete({
					source: availableTags,
					minLength: 1
					}).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
					var inner_html = '<a><div class="list_item_container"><div class="image"><img src="' + item.image + '"></div><div class="label">' + item.label + '</div></div></a>';
					return $( "<li></li>" )
					.data( "item.autocomplete", item )
					.append(inner_html)
					.appendTo( ul );};
				});
					$( '#tags' ).on( "autocompleteselect", function( event, ui )
					{   
						$('#search_friend_div').hide();
						$('#second_div').show();
						$('#second_div').css('height','400px');
						
						imageurl="https://graph.facebook.com/"+ui.item.value+"/picture?width=400&height=400";
						$('.block').each(function(index,value)
						{
						if(index==0)
						$(this).css({'background':'url('+imageurl+') 0px 0px','top':'0px','left':'0px','background-size':'400px 400px'});
						else if(index==1)
						$(this).css({'background':'url('+imageurl+') 300px 0px','top':'0px','left':'100px','background-size':'400px 400px'});
						else if(index==2)
						$(this).css({'background':'url('+imageurl+') 200px 0px','top':'0px','left':'200px','background-size':'400px 400px'});
						else if(index==3)
						$(this).css({'background':'url('+imageurl+') 100px 0px','top':'0px','left':'300px','background-size':'400px 400px'});
						else if(index==4)
						$(this).css({'background':'url('+imageurl+') 300px 300px','top':'100px','left':'100px','background-size':'400px 400px'});
						else if(index==5)
						$(this).css({'background':'url('+imageurl+') 200px 300px','top':'100px','left':'200px','background-size':'400px 400px'});
						else if(index==6)
						$(this).css({'background':'url('+imageurl+') 100px 300px','top':'100px','left':'300px','background-size':'400px 400px'});
						else if(index==7)
						$(this).css({'background':'url('+imageurl+') 0px 200px','top':'200px','left':'0px','background-size':'400px 400px'});
						else if(index==8)
						$(this).css({'background':'url('+imageurl+') 300px 200px','top':'200px','left':'100px','background-size':'400px 400px'});
						else if(index==9)
						$(this).css({'background':'url('+imageurl+') 200px 200px','top':'200px','left':'200px','background-size':'400px 400px'});
						else if(index==10)
						$(this).css({'background':'url('+imageurl+') 100px 200px','top':'200px','left':'300px','background-size':'400px 400px'});
						else if(index==11)
						$(this).css({'background':'url('+imageurl+') 0px 100px','top':'300px','left':'0px','background-size':'400px 400px'});
						else if(index==12)
						$(this).css({'background':'url('+imageurl+') 300px 100px','top':'300px','left':'100px','background-size':'400px 400px'});
						else if(index==13)
						$(this).css({'background':'url('+imageurl+') 200px 100px','top':'300px','left':'200px','background-size':'400px 400px'});
						else if(index==14)
						$(this).css({'background':'url('+imageurl+') 100px 100px','top':'300px','left':'300px','background-size':'400px 400px'});
						else
						console.log('no block');
						});
						console.log('puzzle started');
						$('<img/>').attr('src', imageurl).load(function() 
						{
						$('#image_container').css('background-image','none');
						createpuzzle();
						});
						
						
								
					});
					$('.block').click(function()
						{ 
						currentposition=$(this).position();
						if((Math.abs(currentposition.left-emptybox_x)<=100)&&(Math.abs(currentposition.top-emptybox_y)<=100)&&((Math.abs(currentposition.left-emptybox_x)+Math.abs(currentposition.top-emptybox_y))!=200))
						{
						console.log($(this).css('background').length);
						$(this).css({'left':emptybox_x,'top':emptybox_y});
						emptybox_x=currentposition.left;emptybox_y=currentposition.top;
						
						}
						else
						console.log('this box cant be clicked');
						
						solvedblocks=0;
						$('.block').each(function(index,value)
						{   
							currentposition=$(this).position();
							if(([0,1,2,3].indexOf(index)>-1))
							{
							if((currentposition.top==0) && (currentposition.left==((index%4)*100)))
							{solvedblocks++;}
							}
							else if(([4,5,6].indexOf(index)>-1))
							{
							if((currentposition.top==100) && (currentposition.left==(((index%4)+1)*100)))
							{solvedblocks++;}
							}
							else if(([8,9,10].indexOf(index)>-1))
							{
							if((currentposition.top==200) && (currentposition.left==(((index%4)+1)*100)))
							{solvedblocks++;}
							}
							else if(index==7)
							{
							if((currentposition.top==200) && (currentposition.left==0))
							{solvedblocks++;}
							}
							else if(index==11)
							{
							if((currentposition.top==300) && (currentposition.left==0))
							{solvedblocks++;}
							}
							else if(([12,13,14].indexOf(index)>-1))
							{
							if((currentposition.top==300) && (currentposition.left==(((index%4)+1)*100)))
							{solvedblocks++;}
							}
							else
							{return false;}
							
							if(solvedblocks==15)
							{
							console.log('puzzle solved');
							$('#finish_div').css('visibility','visible');
							$('#finish_div').show();
							clearInterval(game_timer);
							$.post('getscore.php',{user:username,userscore:solvetime,level:difficulty_level,funtodo:'updation'},function(data){console.log(data);});
							}
							
							
						});
						console.log(solvedblocks+' boxes are solved');
						
						});

						var swapbox = function(a,b)
						{
						$('.block').each(function(index,value)
						{
						currentposition=$(this).position();
						if((currentposition.left==(emptybox_x-a))&&(currentposition.top==(emptybox_y-b)))
						{
						$(this).animate({left:emptybox_x,top:emptybox_y},500,function(){createpuzzle();});
						emptybox_x=currentposition.left;emptybox_y=currentposition.top;
						$('#test_img').animate({left:emptybox_x,top:emptybox_y},500);
						console.log('block moved');
						return false;
						}
						if(index==14)
						{createpuzzle();return false;}
						});
						
						};
						function createpuzzle()
						{if(i<difficulty_level)
						{
						randombox_var=Math.floor(Math.random()*4);
						if(i==0)
						oldrandombox_var=randombox_var;
						console.log(i);
						console.log('newvar is '+randombox_var+' old var is '+oldrandombox_var);
						i++;
						if(Math.abs(oldrandombox_var-randombox_var)==2)
						{
						console.log('var needs to be changed');
						
						if(randombox_var%2===0)
						randombox_var=3;
						else
						randombox_var=2;
						}
						console.log('changed var is '+randombox_var);
						if(randombox_var==0)
						swapbox(100,0);
						else if(randombox_var==1)
						swapbox(0,100);
						else if(randombox_var==2)
						swapbox(-100,0);
						else if(randombox_var==3)
						swapbox(0,-100);
						else
						console.log('no random variable generated');
						oldrandombox_var=randombox_var;
						
						}
						else
						{
						game_timer=setInterval(function()
						{
						solvetime++;
						$('#solvetimediv').html(Math.floor(solvetime/60)+':'+solvetime%60+' sec');
						}
						,1000);
						}
						}
				
			
		}
	});
}

</script>
<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</html>