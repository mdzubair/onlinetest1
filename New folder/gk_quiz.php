<?php 
error_reporting(0);
include("db.php");
session_start();
$email= $_SESSION['sid1'];
 
   $quiz_id=$_GET['quiz_id'];
  
  $qs="select * from all_quiz where sr_no=$quiz_id";
    $r=mysqli_query($conn,$qs);
	
      $roa=mysqli_fetch_array($r);
								
							
		$name=$roa['quiz_name'];
		
 $quiz_type=$roa['quiz_type'];


$q="select * from gk_quiz_questions where tes_id='$quiz_id' limit 0,1  ";
    $result=mysqli_query($conn,$q);
	$get_total_rows = mysqli_num_rows($result);
	
      while($row=mysqli_fetch_array($result))
								{ 
						$sr_no=$row['sr_no'];	
		 $question_des=$row['question_des'];
		 $option_a=$row['option_a'];
		 $option_b=$row['option_b'];
		 $option_c=$row['option_c'];
		 $option_d=$row['option_d'];
		 $marks=$row['marks'];
		 $duration=$row['duration'];
		 
								}  
								
								
								$sql="select COUNT(*) AS ABC from gk_quiz_questions where tes_id='$quiz_id'";
    $res=mysqli_query($conn,$sql);
$ro=mysqli_fetch_array($res);
$total= $ro['ABC'];
?>
<input type="hidden" id="sessin" value="<?php echo $email;?>" />
<html>
</head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
	   function countDown() {
      sec--;
  if (sec == -01) {
    sec = 59;
    min = min - 1;
    if(min==-01)
        {
            min=59;
            hour=hour-1;
        }else
            {
                hour=hour;
            }
  } else {
   min = min;
  }
if (sec<=9) { sec = "0" + sec; }

  time = (hour<=9 ? "0" + hour : hour) + " : " + (min<=9 ? "0" + min : min) + " : " + sec + "";
if (document.getElementById) { document.getElementById('timer').innerHTML = time; 

}
  SD=window.setTimeout("countDown();", 1000);
if (hour=='00'&& min == '00' && sec == '00') 
{ 

prr();
//window.location = 'index.php';

}
}

function addLoadEvent(func) {
  var oldonload = window.onload;
  if (typeof window.onload != 'function') {
    window.onload = func;
  } else {
    window.onload = function() {
      if (oldonload) {
        oldonload();
      }
      func();
    }
  }
}

addLoadEvent(function() {
  countDown();
});
	
	</script>
	<script type="text/javascript">
$(document).ready(function () {
	//Disable cut copy paste
	$('body').bind('cut copy paste', function (e) {
		e.preventDefault();
	});
	
	//Disable mouse right click
	$("body").on("contextmenu",function(e){
		return false;
	});
});
</script>
	<script type="text/javascript" >
<?php
$hour=date('H', mktime(0,$duration));
$min=date('i', mktime(0,$duration));
$sec=date('s', mktime(0,$duration,0));


?>
var hour=<?php echo $hour; ?>;
var min=<?php echo $min; ?>;
var sec=<?php echo $sec; ?>;
</script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- Custom Theme files -->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>
<body>
<?php include ('header.php');?> 

<section id="quiz">
<div class="container">
<div class="row">
<div class="col-md-8">
<p>Daily Current GK Test Question And Answers:&nbsp<?php echo $name; ?></p>
</div>
<div class="col-md-4">
  <a href="#">
          <span class="glyphicon glyphicon-eye-open" style="font-size: 16px;
padding-right: 5px;
color: #4beaea;"></span>
        </a>5916
</div>
<div class="clearfix"></div>
</div>

<div class="q-prt2">
<div class="row">
<div class="col-md-9">
<div id="resp">
<div class="row">
<div class="col-md-1">
<div class="qu">Q.1</div>
</div>
<div class="col-md-3">
View In:<select class="select1" onchange="as(<?php echo $sr_no; ?>)" id="df">
<option >Language</option>
<option >Hindi</option>
<option >English</option>
</select>
</div>
<div class="col-md-4">
Marks:<button class="bb2">+<?php echo $marks;?></button><button class="bb1">0</button>
</div>
<div class="col-md-4">
Time Left: <b style="color: #1bb9ad;"><span id="timer" class="timerclass"></span></b>
</div>
</div>
<script>

var str =0;
var opt="";
var s="";
function rad(vl,sdsf){
	opt=vl;
	s=sdsf;
	$('#'+s).css("background","green");
}
function prr(qus_id){
	
var nw_qid=qus_id+1;
	str =str+1;
	 $('#'+nw_qid).css("background","red");
	  var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
			if(xmlhttp.responseText==0){
				alert("Please login to check solutions and report.");
				window.location = "solution_login.php";
			}else{
				
			document.getElementById("resp").innerHTML = xmlhttp.responseText;
			document.getElementById("btn").style.display="";
				document.getElementById("btn1").style.display="none";
				}
				 
             }
         }
          xmlhttp.open("GET", "ajaxqution.php?q="+str+"&qq="+s+"&qqq="+opt+"&quiz_id=<?php echo $quiz_id;?>", true);
		
        xmlhttp.send();
		    //xmlhttp.open("GET", "cart.php?q="+str+"&qq="+s, true);
}
    function pelette(str1,idd){
str =str1;
	
	$('#'+idd).css("background","red");
	  var xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function() {
             if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			
			if(xmlhttp.responseText==0){
				document.getElementById("btn").style.display="none";
				document.getElementById("btn1").style.display="";
				document.getElementById("btn1").innerHTML ='<a class="l-btn2" href="solution_quiz.php">Submit</a>';
			}else{
				
			document.getElementById("resp").innerHTML = xmlhttp.responseText;
			document.getElementById("btn").style.display="";
				document.getElementById("btn1").style.display="none";
				}
				 
             }
         }
          xmlhttp.open("GET", "ajaxpelette.php?q="+str+"&qq="+s+"&qqq="+opt+"&quiz_id=<?php echo $quiz_id;?>"+"&qsid="+idd, true);
		
        xmlhttp.send();
		    //xmlhttp.open("GET", "cart.php?q="+str+"&qq="+s, true);
}   
 
</script>


<div class="question" id="question">
<div id="inst">
<p><?php echo $question_des;?></p>

<ul>

<li>(A) <input type="radio" value="A"  onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_a;?></li>
<li>(B) <input type="radio" value="B" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_b;?></li>
<li>(C) <input type="radio" value="C" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti"> <?php echo $option_c;?></li>
<li>(D) <input type="radio" value="D" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti">  <?php echo $option_d;?></li>
<li>(E) <input type="radio" value="E" onclick="rad(this.value,<?php echo $sr_no; ?>);" name="opti">  <?php echo $option_d;?></li>
</ul>
</div>
</div>



<div class="btn-plat">
<li><button class="l-btn1" onclick="chgclr(<?php echo $sr_no;?>);">Mark For Review</button></li>
<li><button class="l-btn1" onclick="clrres(<?php echo $sr_no;?>);">Clear Responce</button></li>
<div  id="btn1" style="dilplay:none;"></div>
<button class="l-btn2" id="btn" onclick="prr(<?php echo $sr_no;?>);"value="Save & Next">Save & Next</button>
</div>
</div>
</div>
<div class="col-md-3">
<b>Questions Palette</b>
<div class="s-bar">
<div class="row" style="padding-right: 25px;">
<?php
$xy=0;

   
 $x=1;
 

$qq="select * from gk_quiz_questions where tes_id='$quiz_id'";
    $result1=mysqli_query($conn,$qq);
 
	
      while($row1=mysqli_fetch_array($result1))
								{ 
						
						$sr_no1=$row1['sr_no'];	
		
		 
								

?>


<div class="col-md-3">



<a  class="btn btn-default btn-circle " id="<?php echo $sr_no1;?>" value="<?php echo $sr_no1;?>" onclick="pelette('<?php echo $xy; ?>','<?php echo $sr_no1;?>');"> <?php echo $x;?></a>

</div>
<?php 
$x=$x+1;
$xy=$xy+1; } 
?>

</div>
</div>
<strong><h4 style="padding: 10px;">Legend :</h4></strong>
<div class="row">
<div class="col-md-6">
<div class="legend">
<button class="circle"></button><span>Answered</span>
</div>
<div class="legend">
<button class="circle1"></button><span>Marked</span>
</div>
<div class="legend">
<button class="l-btn" onclick="instruc(<?php echo $quiz_id;?>);">Instruction</button></div>
<div class="legend">
<button class="l-btn" onclick="sbmt();">Submit</button></div>
</div>
<div class="col-md-6">
<div class="legend">
<button class="circle2"></button><span>Not Answered</span>
</div>
<div class="legend">
<button class="circle3"></button><span>Not Visited</span>
</div>
<div class="legend">
<button class="l-btn" onclick="profl();">Profile</button></div>
<div class="legend">
<button class="l-btn" onclick="quesppr(<?php echo $quiz_id;?>);">Question Paper</button></div>
</div>
</div>
<div class="clearfix"></div>
</div>
</div>
</div>

</div>
</section>
	<?php include ('footer.php');?>	
	<script>
	$(document).ready(function(){
		var idd=<?php echo $sr_no;?>;
		
		
	 $('#'+idd).css("background","red");
	});
	</script>
	
	<script>
	function chgclr(qid){
		
		 $('#'+qid).css("background","#c258c2");
		
	}
	</script>
	<script>
	function instruc(quzid){
		
		var quzi=quzid;
		
		var dataString='quzi='+ quzi ;
		
		 $.ajax({
                    url: 'instratuction_quiz.php',
					
                    async: false,
                    type: "POST",
                    data:dataString,
                    
                    success: function(response) {
                        $('#inst').html(response);
                    }
                });
		
	}
	</script>
	<script>
	function profl(){
		
		var sessionvalue = document.getElementById('sessin').value;
		
		
		if(sessionvalue == ""){
			alert("To chek this,please login into your account ");
		}
		else{
		  $.ajax({
                    url: 'user_profile.php',
					
                    async: false,
                    type: "POST",
                 
                    
                    success: function(response) {
                        $('#inst').html(response);
                    }
                });
		}
	}
	</script>
	
	<script>
	function quesppr(quzid){
		
		var quzi=quzid;
		
		var dataString='quzi='+ quzi ;
		
		 $.ajax({
                    url: 'quest_ppr.php',
					
                    async: false,
                    type: "POST",
                    data:dataString,
                    
                    success: function(response) {
                        $('#inst').html(response);
                    }
                });
		
	}
	</script>
		<script>
	function sbmt(){
		alert("Please login to check solutions and report.");
		 window.location = "solution_login.php";
	}
	</script>
	
<script>
	function clrres(id){
		
		
		$('input[name=opti]').attr('checked',false);
		$('#'+id).css("background","red");
	}
	</script>

	
	<script>
	
        function as(iid){
			
			var selectV = $('#df :selected').val();
			
			var dataString='selectV='+ selectV + '&iid='+ iid;
			
		 $.ajax({
                    url: 'gkquiz_change_lang.php',
					
                    async: false,
                    type: "POST",
                    data:dataString,
                    
                    success: function(response) {
                        $('#inst').html(response);
                    }
                });;
		}
    </script>
</body>
</html>