<?php
include 'codexWorld_DB.php';
$db = new DB();
$tblName = 'usermaster';
if(isset($_POST['action_type']) && !empty($_POST['action_type'])){
    if($_POST['action_type'] == 'data'){
        $conditions['where'] = array('id'=>$_POST['id']);
        $conditions['return_type'] = 'single';
      
        $user = $db->getRows($tblName,$conditions);
        echo json_encode($user);
    }
    elseif($_POST['action_type'] == 'view'){
        $users = $db->getRows($tblName,array('order_by'=>'id DESC'));
        if(!empty($users)){
            $count = 0;
            foreach($users as $user): $count++;
            echo '<tr>';
            echo '<td>#'.$count.'</td>';
            echo '<td>'.$user['userName'].'</td>';
            echo '<td>'.$user['userEmail'].'</td>';
            echo '<td>'.$user['userRole'].'</td>';
            echo '<td>'.$user['isActive'].'</td>';
            echo '<td><a href="javascript:void(0);" class="glyphicon glyphicon-edit" onclick="editUser(\''.$user['userId'].'\')"></a><a href="javascript:void(0);" class="glyphicon glyphicon-trash" onclick="return confirm(\'Are you sure to delete data?\')?userAction(\'delete\',\''.$user['userId'].'\'):false;"></a></td>';
            echo '</tr>';
            endforeach;
        }else{
            echo '<tr><td colspan="5">No user(s) found......</td></tr>';
        }
    }
    elseif($_POST['action_type'] == 'add'){
        $userData = array(
            'userName' => $_POST['userName'],
            'userEmail' => $_POST['userEmail'],
            'userRole' => $_POST['userRole']
        );
        $insert = $db->insert($tblName,$userData);
        echo $insert?'ok':'err';
    }
    elseif($_POST['action_type'] == 'edit'){
        if(!empty($_POST['userId'])){
            $userData = array(
                'userName' => $_POST['userName'],
                'userEmail' => $_POST['userEmail'],
                'userRole' => $_POST['userRole'],
                'isActive' => $_POST['isActive']
            );
            $condition = array('userId' => $_POST['userId']);
            $update = $db->update($tblName,$userData,$condition);
            echo $update?'ok':'err';
        }
    }
    elseif($_POST['action_type'] == 'deleted'){
        if(!empty($_POST['userId'])){
            $condition = array('userId' => $_POST['userId']);
            $delete = $db->delete($tblName,$condition);
            echo $delete?'ok':'err';
        }
    }
    exit;
}