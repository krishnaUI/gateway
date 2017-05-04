<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{	

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
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
  // checking empty fields
	// checking empty fields
  if(empty($tid) || empty($appname) || empty($applink) || empty($rname1) || empty($rvalue1))  {	
			
if(empty($tid)) {
      echo "<font color='red'>Tenant ID is empty.</font><br/>";
    }
    
    if(empty($appname)) {
      echo "<font color='red'>Application Name field is empty.</font><br/>";
    }
    
    if(empty($applink)) {
      echo "<font color='red'>Application Link field is empty.</font><br/>";
    }

    if(empty($rname1)) {
      echo "<font color='red'>Reposnse name field is empty.</font><br/>";
    }

    if(empty($rvalue1)) {
      echo "<font color='red'>Reposnse Value field is empty.</font><br/>";
    } 
	} else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE gatewaydetails SET tid='$tid',appname='$appname',applink='$applink',rlink='$rlink',rname1='$rname1', rvalue1='$rvalue1',rname2='$rname2', rvalue2='$rvalue2',rname3='$rname3', rvalue3='$rvalue3' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: ./index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM gatewaydetails WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
  $tid = $res['tid'];
  $appname = $res['appname'];
  $applink = $res['applink'];
  $rlink = $res['rlink'];
  $rname1 = $res['rname1'];
  $rvalue1 = $res['rvalue1'];
  $rname2 = $res['rname2'];
  $rvalue2 = $res['rvalue2'];  
  $rname3 = $res['rname3'];
  $rvalue3 = $res['rvalue3'];
  $rname4 = $res['rname4'];
  $rvalue4 = $res['rvalue4'];
  $rname5 = $res['rname5'];
  $rvalue5 = $res['rvalue5'];
}
?>
<html>
<head>	
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="../dist/css/kapstone.css">
  <link rel="stylesheet" href="../dist/css/style.css">
  <title>GatewayDateEdit</title>
</head>

<body>
  <nav class="container-fluid headerbackground" >
    <div class="row">
      <div class="col-sm-2">
        <a class="" href="#">
          <img class="logo" src="../dist/images/kapstonelogo.png" alt=""/>
        </a>
      </div>
      <div class="col-sm-8 btmmenu" >
        <div class="font20 text-white text-center text-bold" href="#">GateWay Form Application</div>
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
          <a class="btn btn-default" href="../index.php"><span class="glyphicon glyphicon-home"></span>Home</a>
          <a class="btn btn-default" href="gatewayAdddata.php"><span class="glyphicon glyphicon-pencil"></span>Add New Data</a>
        </div>
      </div>
    </div>
    <br/>
    <div class="row">
          <div class="col-sm-12">
            <div class="panel panel-primary">

              <div class="panel-heading gatewaypanelheader">Gateway Form Edit</div>
              <form class="form-horizontal" name="form1" method="post" action="gatewayDataEdit.php">
                <br/>
                <div class="row">
                  <div class="form-group">
                    <label for="inputforTID" class="col-sm-2 control-label gatewayfont">Tenant ID</label>
                    <div class="col-sm-10">
                      <input type="text" name="tid" value="<?php echo $tid;?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputforappname" class="col-sm-2 control-label gatewayfont">Application Name</label>
                    <div class="col-sm-10">
                      <input type="text" name="appname" value="<?php echo $appname;?>"/>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputforlink" class="col-sm-2 control-label gatewayfont">Application Link</label>
                    <div class="col-sm-10">
                      <input type="text" name="applink" value="<?php echo $applink;?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputforrlink" class="col-sm-2 control-label gatewayfont">Redirect Url</label>
                    <div class="col-sm-10">
                      <input type="text" name="rlink" value="<?php echo $rlink;?>">
                  </div>
                  </div>
                  <div class="form-group">
                                   <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Response Name</th>
                          <th>Response Value</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td> <input type="text" name="rname1" value="<?php echo $rname1;?>"></td>
                          <td> <input type="text" name="rvalue1" value="<?php echo $rvalue1;?>"></td>
                        </tr>
                        <tr>
                          <td><input type="text" name="rname2" value="<?php echo $rname2;?>"></td>
                          <td><input type="text" name="rvalue2" value="<?php echo $rvalue2;?>">
                          </td>
                        </tr>
                        <tr>
                          <td><input type="text" name="rname3" value="<?php echo $rname3;?>"></td>
                          <td><input type="text" name="rvalue3" value="<?php echo $rvalue3;?>">                    
                          </td>
                        </tr>
                        <tr>
                          <td><input type="text" name="rname4" value="<?php echo $rname4;?>"></td>
                          <td><input type="text" name="rvalue4" value="<?php echo $rvalue4;?>">
                          </td>
                        </tr>
                        <tr>
                          <td><input type="text" name="rname5" value="<?php echo $rname5;?>"></td>
                          <td><input type="text" name="rvalue5" value="<?php echo $rvalue5;?>">
                          </td>
                        </tr>                                                
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                      <button type="submit" name="update" value="Update" class="btn btn-default">Update</button>
                    </div>
                  </div>
                </div>

              </form>
            </div>
            </div>
          </div>
        </body>
        </html>
