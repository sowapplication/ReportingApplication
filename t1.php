<?php 
 include("common/config.php");
 include("class/clientManagement.php");
 $clientObj = new clientManage;
$whereConstraint = "";
$returnJson =	null;
$clientListArray =	array();
$returnJson = $clientObj->getClientList($mysqli,$whereConstraint);
$clientListArray = json_decode($returnJson,true);
include("clientlist.php");
die;
?>