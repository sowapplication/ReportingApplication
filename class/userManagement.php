<?php
//client management class
class userManage
{
    public function addEditUser($mysqli)
    {
        $txtUserName 		= $_POST['txtUserName'];
        $txtUserEmail       = $_POST['txtUserEmail'];
        $txtUserRole 		= $_POST['txtUserRole'];
        $txtUserId 		    = $_POST['txtUserId'];
        $txtUserStatus 		= $_POST['txtUserStatus'];
        
        if ($txtUserId == 0)
        {
            $qry = "INSERT INTO users (name,email,role,status,created) VALUES ('".$txtUserName."','".$txtUserEmail."','".$txtUserRole."','".$txtUserStatus."',now());";
        }
        else if ($txtUserId>0)
        {
            $qry = "UPDATE users SET name = '".$txtUserName."',email = '".$txtUserEmail."',role = '".$txtUserRole."',status = '".$txtUserStatus."',modified=now() WHERE id = '".$txtUserId."' ";
        }
        $mysqli->query($qry);
    }
    public function removeUser($mysqli,$whereConstraint)
    {
        $qry = "delete from users where 1 ";
        
        if ($whereConstraint!= "") {
            $qry .= $whereConstraint;
        }
        $mysqli->query($qry);
    }
    public function getUserList($mysqli,$whereConstraint)
    {
        $qry = "SELECT * FROM users WHERE 1 ";
        if ($whereConstraint!= "") {
            $qry .= $whereConstraint;
        }
        // print $qry;
        $resultSet = array();
        $itr= 0;
        $res = $mysqli->query($qry);
        // if ($mysqli->affected_rows>0) {
        while ($row = $res->fetch_object()) {
            $resultSet[$itr]['id']			= $row->id;
            $resultSet[$itr]['name']			= $row->name;
            $resultSet[$itr]['email']			= $row->email;
            $resultSet[$itr]['role']		    = $row->role;
            $resultSet[$itr]['status']			= $row->status;
            $itr++;
        }
        // }
        $returnJson = json_encode($resultSet);
        return $returnJson;
    }
}
