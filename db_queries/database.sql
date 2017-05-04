create database gateway;

use gateway;

CREATE TABLE `gatewayDetails` (
    `id` int(11) auto_increment,
    `tid` varchar(100),
    `appname` varchar(100),
    `applink` varchar(800),
    `rlink` varchar(800),
    `rname1` varchar(100),
    `rvalue1` varchar(100),
    `rname2` varchar(100) ,
    `rvalue2` varchar(100) ,
    `rname3` varchar(100) ,
    `rvalue3` varchar(100) ,
  PRIMARY KEY  (`id`)
);