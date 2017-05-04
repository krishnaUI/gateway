GateWay Application.

Software requirements
        |
        |__XAMPP or any server for deploy
        |__MySql

Inbuilt config 
PHP, Jquery, HTML, Boostrap

Project Structure
|_dropdown_map/tValues [dorplist]
|_dropdown_map/rValues[dorplist]
|____src/add.php
|____src/gatewayAddData.php
|____src/add.php
|____src/config.php
|____src/gatewayViewData.php
|____src/gatewayDataEdit.php
|____src/gatewayDelete.php
|____index.php
|____Readme


Steps to run the code in windows

1. Copy Gateway folder and paste in C:/xampp/htdocs
2. run my sql workbench 
        run the quires from db_quires folder
5.check the db for for install properly or not
4. got src/config.php and check db-connection properties
5. run xampp and start Apache and MYsql
6. open browser http://localhost:80/gateway/ {note if use other port number check map port number}   
