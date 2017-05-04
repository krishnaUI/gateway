<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">  
  <link rel="stylesheet" href="../dist/css/bootstrap.min.css" >
  <link rel="stylesheet" href="../dist/css/kapstone.css">
  <link rel="stylesheet" href="../dist/css/style.css">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
  <title>GatewayAddData</title>
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
        <div class="font20 text-white text-center text-bold" href="#" >GateWay Form Application</div>
      </div>
      <div class="col-sm-2">
      </div>
    </div>
  </nav>
  <br/>
  <div class="container">
    <div class="row">
      <div class="col-sm-12 ">
        <div class="btn-group">
          <a class="btn btn-default" href="../index.php"><span class="glyphicon glyphicon-home"></span>Home</a>
          <a class="btn btn-default" href="gatewayAdddata.php"><span class="glyphicon glyphicon-pencil"></span>Add New Data</a>
        </div>
      </div>
    </div>
    <br/>
    <div class="row">
      <div class="col-sm-12"> 

        <form class="form-horizontal" action="add.php" method="post" name="form1">
          <input type="hidden" name="id" value="<?php echo $id; ?>"/>

          <div class="panel panel-primary">

            <div class="panel-heading gatewaypanelheader">Gateway Form</div>
            <div class="panel-body well">   
              <div class="form-group">
              <label class="control-label col-sm-2 gatewayfont" for="tid">Teanant ID</label>
                <div class="col-sm-6">
                  <select class="form-control" name="tid" >
                    <?php
                    if ($file = @fopen('../dropdown_map/tValues.txt', 'r')) {
                      while(($line = fgets($file)) !== false) {
                        echo "<option>{$line}</option>";
                      }
                      fclose($file);
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="panel-body well">  
              <div class="form-group">
                <label class="control-label col-sm-2 gatewayfont" for="email">Application Name</label>
                <div class="col-sm-6">
                  <input type="appname" name="appname" class="form-control input-sm" placeholder="Application Name">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2 gatewayfont" for="email">Application Link</label>
                <div class="col-sm-8">
                  <input type="applink" name="applink" class="form-control input-sm" placeholder="Enter Application Link">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-sm-2 gatewayfont" for="rlink">Redirect Url</label>
                <div class="col-sm-8">
                  <input type="rlink" name="rlink" class="form-control input-sm" id="rlink" placeholder="Enter Redirect Link">
                </div>
              </div>
            </div>
            <div class="panel-body well">
              <div class="row">
                <div class="col-sm-8 col-sm-offset-2">

                  <div class="table-responsive">
                    <table class="table" id="tab_logic">
                      <thead>
                        <tr>
                          <th>Response Name</th>
                          <th>Response Value</th>
                          <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr id='addr0' data-id="0" class="hidden">
                          <td data-name="rname">
                            <input class="form-control input-sm" type="text" name='rname0'  placeholder='Name' class="form-control"/>
                          </td>
                          <td data-name="rvalue">
                            <select class="form-control input-sm" name="rvalue">
                              <?php
                              if ($file = @fopen('../dropdown_map/resValues.txt', 'r')) {
                                while(($line = fgets($file)) !== false) {
                                  echo "<option>{$line}</option>";
                                }
                                fclose($file);
                              }
                              ?>
                            </select>
                          </td>
                          <td data-name="del">
                            <button nam"del0" class='btn btn-sm btn-danger glyphicon glyphicon-remove row-remove'></button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <a id="add_row" class="btn btn-success pull-right">Add Row</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group"> 
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="Submit" value="Add"  class="btn btn-primary active">Submit</button>
              </div>
            </div>
            <div class="clearfix"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
    $("#add_row").on("click", function() {
        // Dynamic Rows Code
        
        // Get max row id and set new id
        var newid = 0;
        $.each($("#tab_logic tr"), function() {
            if (parseInt($(this).data("id")) > newid) {
                newid = parseInt($(this).data("id"));
            }
        });
        newid++;
        
        var tr = $("<tr></tr>", {
            id: "addr"+newid,
            "data-id": newid
        });
        
        // loop through each td and create new elements with name of newid
        $.each($("#tab_logic tbody tr:nth(0) td"), function() {
            var cur_td = $(this);
            
            var children = cur_td.children();
            
            // add new td and element if it has a nane
            if ($(this).data("name") != undefined) {
                var td = $("<td></td>", {
                    "data-name": $(cur_td).data("name")
                });
                
                var c = $(cur_td).find($(children[0]).prop('tagName')).clone().val("");
                c.attr("name", $(cur_td).data("name") + newid);
                c.appendTo($(td));
                td.appendTo($(tr));
            } else {
                var td = $("<td></td>", {
                    'text': $('#tab_logic tr').length
                }).appendTo($(tr));
            }
        });
        
        // add delete button and td
        /*
        $("<td></td>").append(
            $("<button class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>")
                .click(function() {
                    $(this).closest("tr").remove();
                })
        ).appendTo($(tr));
        */
        
        // add the new row
        $(tr).appendTo($('#tab_logic'));
        
        $(tr).find("td button.row-remove").on("click", function() {
             $(this).closest("tr").remove();
        });
});




    // Sortable Code
    var fixHelperModified = function(e, tr) {
        var $originals = tr.children();
        var $helper = tr.clone();
    
        $helper.children().each(function(index) {
            $(this).width($originals.eq(index).width())
        });
        
        return $helper;
    };
  
    $(".table-sortable tbody").sortable({
        helper: fixHelperModified      
    }).disableSelection();

    $(".table-sortable thead").disableSelection();



    $("#add_row").trigger("click");
});
  </script>

</body>
</html>
