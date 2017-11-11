<?php
include('function/db1.php');
@session_start();
$test_id = $_SESSION["testid"];
 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$conn,$limit,$adjacent);
}
function showData($data,$conn,$limit,$adjacent){
  $page = $data['page'];
   if($page==1){
   $start = 0;  
   $list1 = 1;
  }
  else{
  $start = ($page-1)*$limit;
  $list1 = 1 + $start;
  }
  $test_id = $_SESSION["testid"];
$get_new_table = "CREATE TEMPORARY TABLE IF NOT EXISTS table_exam AS (SELECT * FROM mst_question WHERE test_id='$test_id' LIMIT 10)";
$run_new = mysqli_query($conn, $get_new_table);


  $sql = "select * from table_exam";
  $rows  = $conn->query($sql);
  $rows  = $rows->num_rows;
  
  $sql = "select * from table_exam limit $start,$limit";  
  $data = $conn->query($sql);


echo "<div class='col-md-10'>";
echo "<div class='faq-form form-profile'>";
echo "<ol class='exam_now' start='$list1'>";

while( $row = $data->fetch_array(MYSQLI_ASSOC))
{
    $que_id = $row['que_id'];
    $que_name = $row['que_name'];
    $ans1 = $row['ans1'];
    $ans2 = $row['ans2'];
    $ans3 = $row['ans3'];
    $ans4 = $row['ans4'];

$uid = $_SESSION["userid"];
	
  $query1 = mysqli_query($conn ,"select * from mst_useranswer WHERE user_id = '$uid' AND question_id = '$que_id'");
	$ansrows = mysqli_fetch_array($query1);
    $answer1 = $ansrows['answer'];
switch ($answer1) {
     case 1:
         $a = "checked"; $b = $c = $d = "";
         break;
     case 2:
         $b = "checked"; $a = $c = $d = "";
         break;
     case 3:
         $c = "checked"; $a = $b = $d = "";
         break;
     case 4:
         $d = "checked"; $a = $b = $c ="";
         break;
     default:
         $a = $b = $c = $d = "";
}
  
echo "<li><p class='questionp'>$que_name</p>";
         echo "<div class='row'>
<form method='POST' action='' id='form'>
		 <div class='col-md-6 col-xs-12'>
<label class='radio-inline ansp'><input type='radio' class='radio' name='right_answer$que_id' $a value='1' onclick='answ(this.value,$que_id)' />$ans1</label>
             </div>
             <div class='col-md-6 col-xs-12'>
<label class='radio-inline ansp'><input type='radio' class='radio' name='right_answer$que_id' $b value='2' onclick='answ(this.value,$que_id)' />$ans2</label>
             </div>
             <div class='col-md-6 col-xs-12'>
<label class='radio-inline ansp'><input type='radio' class='radio' name='right_answer$que_id' $c value='3' onclick='answ(this.value,$que_id)' />$ans3</label>
             </div>
             <div class='col-md-6 col-xs-12'>
<label class='radio-inline ansp'><input type='radio' class='radio' name='right_answer$que_id' $d value='4' onclick='answ(this.value,$que_id)' />$ans4</label>
             </div>
<input type='hidden' id='ansval$que_id' name='ansval$que_id'/>
<input type='hidden' name='question' value='$que_id'/>
</form>

         </div>
";





echo "</li>";
echo "<div class='gap-40'></div>";
}
echo "</ol>";

echo "<div id='txtf'></div>";

echo" 
<script>
function answ(answer,qId) {
document.getElementById('ansval'+qId).value = answer;
showUser(answer,qId);
}
 
 
 function showUser(answer1,qId1) {
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById('txtf').innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open('GET','saveanswer.php?rans='+answer1+'&qid='+qId1,true);
  xmlhttp.send();
}
 
 
</script>


";   












   


echo "</div>";
echo "</div>";
   
echo "<div class='col-md-2'>";
echo "<div class='faq-form form-profile'>";
   
   
pagination($limit,$adjacent,$rows,$page);    
echo "</div>";
echo "</div>";
}


function pagination($limit,$adjacents,$rows,$page){	
	$pagination='';
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$prev_='';
	$first='';
	$lastpage = ceil($rows/$limit);	
	$next_='';
	$last='';
	if($lastpage > 1)
	{	
		
		
		//pages	
		if ($lastpage < 5 + ($adjacents * 2))	//not enough pages to bother breaking it up
		{	
		$first='';
			for ($counter = 1,$counter1 = 1,$group = $limit; $counter <= $lastpage; $counter++,$counter1 = $counter1+$limit,$group = $group + $limit)
			{
				if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter1 -$group</span>";
				else
					$pagination.= "<a class='page-numbers' href=\"?page=$counter\">$counter1 -$group</a>";					
			}
			$last='';
		}
		elseif($lastpage > 3 + ($adjacents * 2))	//enough pages to hide some
		{
			//close to beginning; only hide later pages
			$first='';
			if($page < 1 + ($adjacents * 2))		
			{
				for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a class='page-numbers' href=\"?page=$counter\">$counter</a>";					
				}
			$last.= "<a class='page-numbers' href=\"?page=$lastpage\">Last</a>";			
			}
			
			//in middle; hide some front and some back
			elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
			{
		       $first.= "<a class='page-numbers' href=\"?page=1\">First</a>";	
			for ($counter = 1,$counter1 = 1,$group = $limit; $counter <= $lastpage; $counter++,$counter1 = $counter1+$limit,$group = $group + $limit)
				{
					if ($counter == $page)
					$pagination.= "<span class=\"current\">$counter1 -$group</span>";
					else
						$pagination.= "<a class='page-numbers' href=\"?page=$counter\">$counter</a>";					
				}
				$last.= "<a class='page-numbers' href=\"?page=$lastpage\">Last</a>";			
			}
			//close to end; only hide early pages
			else
			{
			    $first.= "<a class='page-numbers' href=\"?page=1\">First</a>";	
				for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page)
						$pagination.= "<span class=\"current\">$counter</span>";
					else
						$pagination.= "<a class='page-numbers' href=\"?page=$counter\">$counter</a>";					
				}
				$last='';
			}
            
			}
		$pagination = "<div class=\"pagination\">".$first.$prev_.$pagination.$next_.$last;
		//next button
		
		$pagination.= "</div>\n";		
	}

	echo $pagination;  
}


function pagination1($limit,$adjacents,$rows,$page){	
	$pagination='';
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$prev_='';
	$first='';
	$lastpage = ceil($rows/$limit);	
	$next_='';
	$last='';
	if($lastpage > 1)
	{
			$counter = 1;
				if ($counter <= $lastpage)
					$pagination = "<a class='page-numbers' href=\"?page=$counter+1\">save and next</a>";
				else{
					$pagination = "<span class=\"current\">$counter</span>";
				}
				$counter = $counter+1;
		$pagination = "<div class=\"pagination\">".$first.$prev_.$pagination.$next_.$last;
		//next button
		
		$pagination.= "</div>\n";		

	}

	echo $pagination;  
}

?>












 