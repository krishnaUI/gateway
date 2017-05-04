<html>
<head>
	<title>Add Data</title>
</head>

<body>
<?php
//including the database connection file
include_once("config.php");

if(isset($_POST['Submit'])) {	
	$tid = mysqli_real_escape_string($mysqli, $_POST['tid']);
	$appname = mysqli_real_escape_string($mysqli, $_POST['appname']);
	$applink = mysqli_real_escape_string($mysqli, $_POST['applink']);
  $rlink = mysqli_real_escape_string($mysqli, $_POST['rlink']);
  $rname1 = mysqli_real_escape_string($mysqli, $_POST['rname1']);
  $rvalue1 = mysqli_real_escape_string($mysqli, $_POST['rvalue1']);
  $rname2 = mysqli_real_escape_string($mysqli, $_POST['rname2']);
  $rvalue2 = mysqli_real_escape_string($mysqli, $_POST['rvalue2']);
  $rname3 = mysqli_real_escape_string($mysqli, $_POST['rname3']);
  $rvalue3 = mysqli_real_escape_string($mysqli, $_POST['rvalue3']);
  $rname4 = mysqli_real_escape_string($mysqli, $_POST['rname4']);
  $rvalue4 = mysqli_real_escape_string($mysqli, $_POST['rvalue4']);
  $rname5 = mysqli_real_escape_string($mysqli, $_POST['rname5']);
  $rvalue5 = mysqli_real_escape_string($mysqli, $_POST['rvalue5']);
	// // checking empty fields
	if(empty($tid) || empty($appname) || empty($applink) || empty($rlink) || empty($rname1) || empty($rvalue1)) {
				
		if(empty($tid)) {
			echo "<font color='red'>Tenant ID is empty.</font><br/>";
		}
		
		if(empty($appname)) {
			echo "<font color='red'>Application Name field is empty.</font><br/>";
		}
		
		if(empty($applink)) {
			echo "<font color='red'>Application Link field is empty.</font><br/>";
		}

    if(empty($rlink)) {
      echo "<font color='red'>Redirect Link field is empty.</font><br/>";
    }

    if(empty($rname1)) {
      echo "<font color='red'>Reposnse name field is empty.</font><br/>";
    }

    if(empty($rvalue1)) {
      echo "<font color='red'>Reposnse Value field is empty.</font><br/>";
    }	
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($mysqli, "INSERT INTO gatewaydetails(tid,appname,applink,rlink,rname1,rvalue1,rname2,rvalue2, rname3, rvalue3, rname4, rvalue4,  rname5, rvalue5) VALUES('$tid','$appname','$applink', '$rlink','$rname1', '$rvalue1', '$rname2', '$rvalue2', '$rname3', '$rvalue3','$rname4', '$rvalue4','$rname5', '$rvalue5')");
    header("Location: ../index.php");
		// //display success message
		// echo "<font color='green'>Data added successSfully.";
		// echo "<br/><a href='index.php'>View Result</a>";
	}
}
?>
</body>
</html>
