<?php 
//session_start(); 
include('include/header.php'); 
?>
<!-- Latest Work -->
<div class="cyber-box">
<div class="container">
<div class="gap-40"></div>

<div class="row">
<div class="col-md-6 col-xs-12" style="margin-left: 248px;">
<div class="box-inner">
<div class="faq-form form-login">
<div class="row">
<h4>Please Login here</h4></div>
<div class="gap-20"></div>
<form method="post" action="function/function.php">

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="label2">Login Id</label>
<input class="form-control" name="member-username" placeholder="Enter Login Id" type="text" required />
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="form-group">
<label class="label2">Password</label>
<input class="form-control" name="member-pass" placeholder="Enter Password" type="password" required />
</div>
</div>
</div>

<div class="gap-20"></div> 



<div class="row">
<div class="col-md-12">
<div class="form-group">
<input class="btn btn-primary" name="login-member" type="submit" value=" Login " required />
<!--<span class="wrongmsg"><?php //if(isset($_SESSION['login-msg'])){echo $_SESSION['login-msg'];unset($_SESSION['login-msg']);}*/?></span>-->			
</div>
</div>
</div>
</form>           
</div>


</div>
</div>
</div>
</div>        </div>

<!-- Testimonials -->


<?php include('include/footer.php'); ?>
