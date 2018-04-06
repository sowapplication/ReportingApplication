<html>
<head>
<link rel="stylesheet"
	href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script
	src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script
	src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<style>

/* required style*/
.none {
	display: none;
}

/* optional styles */
table tr th, table tr td {
	font-size: 1.2rem;
}

.row {
	margin: 20px 20px 20px 20px;
	width: 100%;
}

.glyphicon {
	font-size: 20px;
}

.glyphicon-plus {
	float: right;
}

a.glyphicon {
	text-decoration: none;
}

a.glyphicon-trash {
	margin-left: 10px;
}
</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="panel panel-default users-content">
				<div class="panel-heading">
					Users <a href="javascript:void(0);"
						class="glyphicon glyphicon-plus" id="addLink"
						onclick="javascript:$('#addForm').slideToggle();">Add</a>
				</div>
				<div class="panel-body none formData" id="addForm">
					<h2 id="actionLabel">Add User</h2>
					<form class="form" id="userForm">
						<div class="form-group">
							<label>User Name</label> <input type="text" class="form-control"
								name="userName" id="userName" />
						</div>
						<div class="form-group">
							<label>User Email</label> <input type="text" class="form-control"
								name="userEmail" id="userEmail" />
						</div>
						<div class="form-group">
							<label>User Role</label> <select
								style="width: 100%;" tabindex="-1" aria-hidden="true" class="form-control"
								name="userRole" id="userRole">
								<option selected="selected">select</option>
								<option value="user">User</option>
								<option value="admin">Admin</option>
								<option value="superadmin">Super Admin</option>
							</select>
						</div>
						<a href="javascript:void(0);" class="btn btn-warning"
							onclick="$('#addForm').slideUp();">Cancel</a> <a
							href="javascript:void(0);" class="btn btn-success"
							onclick="userAction('add')">Add User</a>
					</form>
				</div>
				<div class="panel-body none formData" id="editForm">
					<h2 id="actionLabel">Edit User</h2>
					<form class="form" id="userForm">
						<div class="form-group">
							<label>User Name</label> <input type="text" class="form-control"
								name="userName" id="userNameEdit" />
						</div>
						<div class="form-group">
							<label>User Email</label> <input type="text" class="form-control"
								name="userEmail" id="userEmailEdit" />
						</div>
						<div class="form-group">
							<label>User Role</label> <input type="text" class="form-control"
								name="userRole" id="userRoleEdit" />
						</div>
						<div class="form-group">
							<label>Status</label> <input type="text" class="form-control"
								name="userActive" id="userActiveEdit" />
						</div>
						<input type="hidden" class="form-control" name="id" id="idEdit" />
						<a href="javascript:void(0);" class="btn btn-warning"
							onclick="$('#editForm').slideUp();">Cancel</a> <a
							href="javascript:void(0);" class="btn btn-success"
							onclick="userAction('edit')">Update User</a>
					</form>
				</div>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>User Name</th>
							<th>User Email</th>
							<th>User Role</th>
							<th>User Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="userData">
                    <?php
                    include 'codexWorld_DB.php';
                    $db = new DB();
                    $users = $db->getRows('usermaster', array(
                        'order_by' => 'userid DESC'
                    ));
                    if (! empty($users)) :
                        $count = 0;
                        while($user = $db->getRows('usermaster',$count))
                        {
                           
                        
                            $count ++;
                            print  "userRole...".$user['userRole'];
                            die;
                            ?>
                         
                    <tr>
							<td><?php echo '#'.$count; ?></td>
							<td><?php echo $user['userName']; ?></td>
							<td><?php echo $user['userEmail']; ?></td>
							<td><?php echo $user['userRole']; ?></td>
							<td><?php echo $user['isActive']; ?></td>
							<td><a href="javascript:void(0);"
								class="glyphicon glyphicon-edit"
								onclick="editUser('<?php echo $user['userId']; ?>')"></a> <a
								href="javascript:void(0);" class="glyphicon glyphicon-trash"
								onclick="return confirm('Are you sure to delete data?')?userAction('delete','<?php echo $user['userId']; ?>'):false;"></a>
							</td>
						</tr>
						
                    <?php } ?>
                    <tr>
							<td colspan="5">No user(s) found......</td>
						</tr>
                    <?php endif; ?>
                </tbody>
				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">
function getUsers(){
    $.ajax({
        type: 'POST',
        url: 'codexworld_userAction.php',
        data: 'action_type=view&'+$("#userForm").serialize(),
        success:function(html){
            $('#userData').html(html);
        }
    });
}

function userAction(type,id){
    id = (typeof id == "undefined")?'':id;
    var statusArr = {add:"added",edit:"updated",deleted:"deleted"};
    var userData = '';
    if (type == 'add') {
        userData = $("#addForm").find('.form').serialize()+'&action_type='+type+'&userId='+id;
    }else if (type == 'edit'){
        userData = $("#editForm").find('.form').serialize()+'&action_type='+type;
    }else{
        userData = 'action_type='+type+'&userId='+id;
    }
   console.log("userData..."+userData) ;
    $.ajax({
        type: 'POST',
        url: 'codexworld_userAction.php',
        data: userData,
        success:function(msg){
            if(msg == 'ok'){
                alert('User data has been '+statusArr[type]+' successfully.');
                getUsers();
                $('.form')[0].reset();
                $('.formData').slideUp();
            }else{
                alert('Some problem occurred, please try again.');
            }
        }
    });
}
function editUser(userId){
    $.ajax({
        type: 'POST',
        dataType:'JSON',
        url: 'codexworld_userAction.php',
        data: 'action_type=data&userid='+userId,
        success:function(data){
            $('#idEdit').val(data.id);
            $('#userNameEdit').val(data.userName);
            $('#userEmailEdit').val(data.userEmail);
            $('#userRoleEdit').val(data.userRole);
            $('#userActiveEdit').val(data.isActive);
            $('#editForm').slideDown();
        }
    });
}
</script>

</body>

</html>