<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8"/>
   <meta name="author" content="Yao Pengfei"/>
   <meta name="description" content="game 游戏"/>
   <meta name="keywords" content="web game phone 网页游戏"/>
   <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0" />
   
   <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<style>
.div1,.div2,.div3,.div4{
	border-radius: 5px;
	background-color: #ff9900;
	box-shadow: 5px 5px 5px #888888;
	-webkit-transition:width 3s;
	-webkit-transition-timing-function:ease-out;
	transition:width 3s;
	transition-timing-function:ease-out;
	-moz-transition:width 3s;
	-moz-transition-timing-function:ease-out;
	-o-transition:width 3s;
	-o-transition-timing-function:ease-out;	
}
.div1{
        position:absolute;
	    height:6%;
	    width:80%;
        top:35%;
		margin-left: -11%;
        left:20%;	
}
.div2{
        position:absolute;
	    height:6%;
	    width:80%;
        top:42%;
        left:20%;	
				margin-left: -11%;
}
.div3{
        position:absolute;
	    height:6%;
	    width:80%;
        top:49%;
        left:20%;	
		margin-left: -11%;
}
.div4{
        position:absolute;
	    height:6%;
	    width:80%;
        top:56%;
        left:20%;	
		margin-left: -11%;
}
body{
	text-align: center;
	margin:auto;
   }
.div1:hover{
	width:90%;

}
.div2:hover{
	width:90%;

}
.div3:hover{
	width:90%;

}
.div4:hover{
	width:90%;

}

#rightMinEdge{
        width:0.3%;
		height:100%;
		background-color:red;
		position:absolute;
		top:0;
		left:90%;
}

#leftMaxEdge{
        width:1%;
		height:100%;
		background-color:green;
		position:absolute;
		top:0;
		left:9%;
}
#tail{
    position:absolute;
	top:70%;
	left:50%;
    margin-left:-20%;
	width:40%;
	font-size:150%;
	


}
#divHead{
        text-align:center;
		width:40%;
		position:absolute;
		left:50%;
		margin-left:-20%;
		top:5%;
		font-size:100%;


}
</style>
</head>

<body>
    <?php
//   $file=fopen("timedata.txt","r");
// $longestTime=fgets($file);
      
// fclose($file); 
    $s = new SaeStorage();
    $longestTime= $s->read('data','timedata.txt');
    
    ?>
<div class="container" >

    <div id="divHead">
      <h2 id="title1">你能坚持多长时间?</h2>
        <h3>目前为止最长时间:<span id="longestTime"><?php echo $longestTime ?> </span>秒</h3>
        <h4>敢不敢测试你的时间？你的时间暂时为：<span id="localTime" style="font-size:large">0</span>秒</h4>
      <button id="start"  class="btn btn-shadow btn-lg">开始</button><br><span style="color:red">点击开始，游戏开始</span><br>
      <h4 id="time0"><span style="font-style:bold">Time</span>:<span id="time">0</span></h4>
	  </div>
  <div id="rightMinEdge">
  </div>
  <div id="leftMaxEdge">
  </div>
      <div  class="div1">
	  </div>
	   <div  class="div2">
	   </div>
	   <div  class="div3">
	  </div>
	  <div  class="div4">
	  </div><br><br>
    <h3 id="tail" class="text-warning">看谁让四个方形条同时超过红线的时间最长！！！</h3>  


</body>
<script src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
  
    var ms=1;
    var state=0;
    var x1len;
    var x2len;
    var x3len;
    var x4len;
    var mywidth;
    var myclock;
	var longestTime=parseFloat($("#longestTime").text());
    var localTime=0;
	var xmlhttp;
    $(document).ready(function(){
           
        $(".div1").off("hover");    
             
	    $("#time0").hide();	
		$("#start").click(function(){;
		    $("#time0").show();
			   ms=0;		
			$("#time").text(ms+"秒");
			  state=0;
            myclock=setTimeout("display();",50);
              $(".div1").css("background-color","#ff9900");
              $(".div2").css("background-color","#ff9900");
              $(".div3").css("background-color","#ff9900");
              $(".div4").css("background-color","#ff9900");
		
		});
		$("#game").on("hover",function(){

                  mywidth=parseInt($("#rightMinEdge").position().left)-parseInt($("#leftMaxEdge").position().left);
                  x1len=parseInt($(".div1").width());
			      x2len=parseInt($(".div2").width());
				  x3len=parseInt($(".div3").width());
				  x4len=parseInt($(".div4").width());
		});
	  });


function display(){

                 myclock=setTimeout("display();",50);
                 mywidth=parseInt($("#rightMinEdge").position().left)-parseInt($("#leftMaxEdge").position().left);
                 x1len=parseInt($(".div1").width());
                 x2len=parseInt($(".div2").width());
                 x3len=parseInt($(".div3").width());
                 x4len=parseInt($(".div4").width());

                 if((state==0)&&(x1len>=mywidth)&&(x2len>=mywidth)&&x3len>=mywidth&&(x4len>=mywidth)){
                  state=1;
                  then=new Date();
                  then.setTime(then.getTime()-ms);
                   $(".div1").css("background-color","#66ffff");
                   $(".div2").css("background-color","#66ffff");
                   $(".div3").css("background-color","#66ffff");
                   $(".div4").css("background-color","#66ffff");
                }
               	if(state==1){
               		now=new Date();
               		ms=now.getTime()-then.getTime();
               		ms=ms/1000;
               		$("#time").text(ms+"秒");
                  if((x1len<mywidth)||(x2len<mywidth)||x3len<mywidth||(x4len<mywidth)){
                        now=new Date();
                        ms=now.getTime()-then.getTime();
                        ms=ms/1000;
                        $("#time").text(ms+"秒");
						if(parseInt(localTime)<parseInt(ms)){
                            localTime=parseFloat(ms);
						   $("#localTime").text(localTime);
                            if(localTime>longestTime)
                            { longestTime=localTime;
                              update();
                            }
						}
                         $(".div1").css("background-color","#6633ff");
                         $(".div2").css("background-color","#6633ff");
                          $(".div3").css("background-color","#6633ff");
                         $(".div4").css("background-color","#6633ff");
						clearTimeout(myclock);
					    $("#time").css("font-weight","bold"); 
					

          

               	}


              }
               }
    function update()
{
    
var xmlhttp;
if (window.XMLHttpRequest)
  {
  xmlhttp=new XMLHttpRequest();
  }
else
  {
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
       document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    }
  }

xmlhttp.open("GET","updateTime.php?q="+longestTime,true);
xmlhttp.send();
}
   window.onbeforeunload = function() { 


       update();
       return "刷新或者离开页面后，你的目前成绩就没有了";
　　
} 

</script>
</html>
