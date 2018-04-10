<?php 
class clientManage 
{
	public function addEditClient($mysqli) 
	{
		$txtClientName 		= $_POST['txtClientName'];
		$txtClientLegalName = $_POST['txtClientLegalName'];
		$txtClientId 		= $_POST['txtClientId'];
		$isActive			= 1;
		$userId				= 1;	
		if ($txtClientId==0) {
			$qry = "INSERT INTO clientMaster (clientName,clientLegalName,isActive,userId) VALUES ('".$txtClientName."','".$txtClientLegalName."','".$isActive."','".$userId."');";
		} else if ($txtClientId>0) {
			$qry = "UPDATE clientMaster SET clientName = '".$txtClientName."',clientLegalName = '".$txtClientLegalName."' WHERE clientId = '".$txtClientId."' ";
		}
		$mysqli->query($qry);
	}
	public function removeClient($mysqli)
	{
	    $txtClientName 		= $_POST['txtClientName'];
	    $txtClientLegalName = $_POST['txtClientLegalName'];
	    $txtClientId 		= $_POST['txtClientId'];
	    $isActive			= 1;
	    $userId				= 1;
	    
	    $qry = "delete from clientMaster where clientId = '".$txtClientId."'";
	    $mysqli->query($qry);
	}
	public function getClientList($mysqli,$whereConstraint) 
	{
		$qry = "SELECT * FROM clientMaster WHERE 1 ";
		if ($whereConstraint!= "") {
			$qry .= $whereConstraint;
		}
		// print $qry;
		$resultSet = array();
		$itr= 0;
		$res = $mysqli->query($qry);
		// if ($mysqli->affected_rows>0) {
			while ($row = $res->fetch_object()) {
				$resultSet[$itr]['clientId']			= $row->clientId;
				$resultSet[$itr]['clientName']			= $row->clientName;
				$resultSet[$itr]['clientLegalName']		= $row->clientLegalName;
				$resultSet[$itr]['isActive']			= $row->isActive;
				$resultSet[$itr]['userId']				= $row->userId;
				$itr++;
			}
		// }
		$returnJson = json_encode($resultSet);
		return $returnJson;
	}
}
