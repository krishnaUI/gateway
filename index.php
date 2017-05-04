<?php
//including the database connection file
include_once("src/config.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM gatewayDetails ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" href="dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="dist/css/kapstone.css">
  <link rel="stylesheet" href="dist/css/style.css">	
  <title>Homepage</title>
</head>

<body>
  <nav class="container-fluid headerbackground" >
    <div class="row">
      <div class="col-sm-2">
        <a class="" href="#">
          <img class="logo" src="dist/images/kapstonelogo.png" alt=""/>
        </a>
      </div>
      <div class="col-sm-8 btmmenu" >
        <div class="font20 text-white text-center text-bold" href="#" >GateWay Form Application</div>
      </div>
      <div class="col-sm-2">
      </div>
    </div>
  </nav>

  <br/>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="btn-group">
          <a class="btn btn-default" href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a>
          <a class="btn btn-default" href="src/gatewayAddData.php"><span class="glyphicon glyphicon-pencil"></span>Add New Data</a>
        </div>
      </div>
    </div>
    <br/>
    <div class="row">
      <div class="col-sm-">
      <div class="table-responsive">
        <div class="panel panel-primary">

          <div class="panel-heading gatewaypanelheader">Detailed View</div>
          
          <table class="table table-bordered ">
            <thead>
              <tr class="gatewayfont">
                <th>Tenant ID</th>
                <th>Application Name</th>
                <th>Application Link</th>
                <th>Redirect Url</th>
              </tr>
            </thead>
            <?php 
//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
            while($res = mysqli_fetch_array($result)) { 		
              echo "<tbody><tr>";
              echo "<td>".$res['tid']."</td>";
              echo "<td>".$res['appname']."</td>";
              echo "<td>".$res['applink']."</td>";
              echo "<td>".$res['rlink']."</td>";
              echo "<td><a class=\"btn btn-success\" href=\"src/gatewayViewData.php?id=$res[id]\"><span class=\"glyphicon glyphicon-check\"></span>View</a><a class=\"btn btn-warning\" href=\"src/gatewayDataedit.php?id=$res[id]\"><span class=\"glyphicon glyphicon-edit\"></span>Edit</a><a class=\"btn btn-danger\" href=\"src/gatewayDelete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to gatewayDelete?')\"><span class=\"glyphicon glyphicon-trash\"></span>Delete</a></td>";	
              echo "</tr></tbody>";	
            }
            ?>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
