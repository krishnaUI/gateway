<?php
// including the database connection file
include_once("config.php");
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
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <title>GatewayViewData</title>
</head>

<body>
  <nav class="container-fluid headerbackground" >
    <div class="row">
      <div class="col-sm-2">
        <a class="" href="#">
          <img class="logo" src="../dist/images/kapstonelogo.png" alt="LOGO"/>
        </a>
      </div>
      <div class="col-sm-8 btmmenu" >
        <div class="font20 text-white text-center text-bold" href="#">GateWay Form Application </div>
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
    <div class="row-fluid">
      <div class="col-sm-12">
        <div class="panel panel-primary">
          <div class="panel-heading gatewaypanelheader">Gateway Deatiled Form </div>
          <div class="panel-body">
          <form class="form-horizontal">
          <div class="row">
            <div class="pull-right">
            		<a href="#" class="btn btn-default" id="export"><span class="glyphicon glyphicon-export"></span>&nbsp;Export Data</a>
            </div>
          </div>
            <div class="row">   
              <div class="col-sm-10 col-sm-offset-1">
                <div class="form-group">
                <div id="dvData">
                  <table class="table table-border" id="viewdatatable">
                    <tbody class="wrap1">
                    <tr>
                      <th>Tenant ID</th>
                      <td><?php echo $tid;?></td>
                    </tr>
                    <tr><th>Application Name</th>
                      <td> <?php echo $appname;?></td>
                    </tr>
                    <tr><th>Application Link</th>
                      <td><?php echo $applink;?></td>
                    </tr>
                    <tr>
                      <th>Redirect Url</th>
                      <td><?php echo $rlink;?></td>
                    </tr>
                    </tbody>
                    <tbody class="wrap2">
                    <tr>		
                        <th>Response Name</th>
                        <th>Response Value</th>
                    </tr>
                    <tr>
                      <td><?php echo $rname1;?></td>
                      <td><?php echo $rvalue1;?></td>
                    </tr>
                    <tr>
                      <td> <?php echo $rname2;?></td>
                      <td><?php echo $rvalue2;?></td>
                    </tr>
                    <tr>
                      <td><?php echo $rname3;?></td>
                      <td><?php echo $rvalue3;?></td>
                    </tr>
                    <tr>
                      <td> <?php echo $rname4;?></td>
                      <td><?php echo $rvalue4;?></td>
                    </tr>
                    <tr>
                      <td><?php echo $rname5;?></td>
                      <td><?php echo $rvalue5;?></td>
                    </tr>
                    </tbody>
                    </table>
                  </div>
                </div>
               </div>
                </div>
            </form>
            </div>
          </div>
          <div class="clearfix"></div>
        </div>    
      </div>
   </div> 
<script type="text/javascript">
$(document).ready(function () {

    function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(td)'),

            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = ':',
            rowDelim = '\r\n',

            // Grab text from table into CSV formatted string
            csv = '' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace(/"/g, ''); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '';

				// Deliberate 'false', see comment below
        if (false && window.navigator.msSaveBlob) {

						var blob = new Blob([decodeURIComponent(csv)], {
	              type: 'text/csv;charset=utf8'
            });
            
            // Crashes in IE 10, IE 11 and Microsoft Edge
            // See MS Edge Issue #10396033: https://goo.gl/AEiSjJ
            // Hence, the deliberate 'false'
            // This is here just for completeness
            // Remove the 'false' at your own risk
            window.navigator.msSaveBlob(blob, filename);
            
        } else if (window.Blob && window.URL) {
						// HTML5 Blob        
            var blob = new Blob([csv], { type: 'text/csv;charset=utf8' });
            var csvUrl = URL.createObjectURL(blob);

            $(this)
            		.attr({
                		'download': filename,
                		'href': csvUrl
		            });
				} else {
            // Data URI
            var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

						$(this)
                .attr({
               		  'download': filename,
                    'href': csvData,
                    'target': '_blank'
            		});
        }
    }

    // This must be a hyperlink
    $("#export").on('click', function (event) {
        // CSV
        var args = [$('#dvData>table'), 'export.txt'];
        
        exportTableToCSV.apply(this, args);
        
        // If CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
});
</script>        
  </body>
</html>
