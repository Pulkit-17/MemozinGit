


<?php
include 'sqlconnect.php';
include 'init_core.php';
include 'head_info.php';
include 'sidebar.php';
include 'functions.php';



if(loggedin()) {
$uid=$_SESSION['uid'];
$query="select * from New_Employee where empid='$uid'";
if($query_run=mysqli_query($c,$query)){
	if(mysqli_num_rows($query_run)>0){
		while($result=mysqli_fetch_assoc($query_run)){
			$name=$result['full_name'];
			$empid=$result['empid'];
			$email=$result['email'];
			$phone=$result['phone'];
			$dob=$result['dob'];
			$sex=$result['sex'];
			$marital=$result['marital'];
			$department=$result['department'];
			$sub_department=$result['sub_department'];
			$joining=$result['joining'];
			$salary=$result['salary'];
			$cur_address=$result['cur_address'];
			$cur_city=$result['cur_city'];
			$cur_state=$result['cur_state'];
			$address=$cur_address.", ".$cur_city.", ".$cur_state;

		}
	}
}
?>

<div class="container">
      <?php display_employee($empid,$name,$department,$sub_department,$email,$joining,$dob,$sex,$salary,$phone,$address); ?>
    </div>
 

  <?php
  }
  else 
  	header('Location: index.php');
  ?>