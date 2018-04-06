<?php
class userManage
{
    public function addUser($mysqli)
    {
        $txtUserName 		= $_POST['txtUserName'];
        $txtUserEmailId     = $_POST['txtUserEmailId'];
        $txtUserRole        = $_POST['txtUserRole'];
        $isActive			= 1;
        $qry = "INSERT INTO userMaster(userName,userEmail,userRole,isActive) VALUES ('".$txtUserName."','".$txtUserEmailId."','".$txtUserRole."','".$isActive."');";
        $mysqli->query($qry);
    }
    public function editUser($mysqli,$whereConstraint)
    {
        $txtUserName 		= $_POST['txtUserName'];
        $txtUserEmailId     = $_POST['txtUserEmailId'];
        $txtUserRole        = $_POST['txtUserRole'];
        $isActive			= 1;
        $qry = "update userMaster set userName='".$txtUserName."',userEmail='".$txtUserEmailId."',userRole='".$txtUserRole."' where 1 ";
        if ($whereConstraint != "") {
            $qry .= $whereConstraint;
        }
        $mysqli->query($qry);
    }
    public function getUserList($mysqli,$whereConstraint)
    {
        $qry = "SELECT * FROM userMaster WHERE 1 ";
        if ($whereConstraint!= "") 
        {
            $qry .= $whereConstraint;
        }
        $resultSet = array();
        $itr= 0;
        $res = $mysqli->query($qry);
        while ($row = $res->fetch_object()) 
        {
            $resultSet[$itr]['userName']			= $row->userName;
            $resultSet[$itr]['userEmail']		    = $row->userEmail;
            $resultSet[$itr]['userRole']			= $row->userRole;
            $resultSet[$itr]['isActive']			= $row->isActive;
            $itr++;
        }
        $returnJson = json_encode($resultSet);
        return $returnJson;
    }
}