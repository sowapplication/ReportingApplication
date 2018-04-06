<?php 
class clientManage 
{
	public function addEditClient($mysqli) 
	{
		$txtClientName 		= $_POST['txtClientName'];
		$txtClientLegalName = $_POST['txtClientLegalName'];
		$isActive			= 1;
		$userId				= 1;	
		$qry = "INSERT INTO clientMaster (clientName,clientLegalName,isActive,userId) VALUES ('".$txtClientName."','".$txtClientLegalName."','".$isActive."','".$userId."');";
		$mysqli->query($qry);
	}
	public function getClientList($mysqli,$whereConstraint) 
	{
		$qry = "SELECT * FROM clientMaster WHERE 1 ";
		if ($whereConstraint!= "") {
			$qry .= $whereConstraint;
		}
		$resultSet = array();
		$itr= 0;
		$res = $mysqli->query($qry);
		// if ($mysqli->affected_rows>0) {
			while ($row = $res->fetch_object()) {
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
