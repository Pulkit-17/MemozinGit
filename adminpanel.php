<?php
include "init_core.php";
include 'head_info.php';
include "sqlconnect.php";


if(!loggedin()){
  header('Location:index.php');
}
else{

$query="select distinct department from department";

if($query_run=mysqli_query($c,$query)){
	while($result=mysqli_fetch_assoc($query_run)){
		$department[]=$result['department'];

	}
}

$query="select subdepartment, department from department group by subdepartment";

if($query_run=mysqli_query($c,$query)){
  while($result=mysqli_fetch_assoc($query_run)){
    $array[$result['subdepartment']]=$result['department'];

  }
}




?>

<script type="text/javascript">
var obj=
<?php
echo "{";
$fool=1;
foreach ($array as $key => $value) {
  if($fool!=1) 
          echo ",";
  echo "'".$key."': '".$value."'";
  $fool=0;
}
echo "}";
  ?>
</script>

<body>
<?php include 'sidebar.php'; 
     
?>
      <div class="tab" style="margin-left:3%;">
      <button class="tablinks" onclick="openCity(event, 'Newemployee')" id="defaultOpen">New Employee</button>
      <button class="tablinks" onclick="openCity(event, 'Qualifications')">Qualifications</button>
      <button class="tablinks" onclick="openCity(event, 'Experience')">Experience</button>
   </div>
   <div id="Newemployee" class="tabcontent">
     <?php include 'newemployee.php'; ?>
   </div>
   <!-- /.container -->
   
   <div id="Qualifications" class="tabcontent">
   <?php include 'qualifications.php'; ?>
   </div>
   <div id="Experience" class="tabcontent">
        <?php include 'experience.php'; ?>
   </div>
  <?php include 'all_scripts.php'; ?>
   
</body>
</html> 
<?php

}
?>