
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">User List</h3>
</div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>User Name</th>
      <th>User Email</th>
      <th>User Role</th>
      <th>User Status</th>
      <th>Manage</th>
    </tr>
    </thead>
    <tbody>
	
	<?php 
		if (sizeof($userListArray)>0) {
			foreach($userListArray as $key => $value) {
	?>
    <tr>
      <td><?php print $value['name']; ?></td>
      <td><?php print $value['email']; ?></td>
      <td><?php print $value['role']; ?></td>
      <td><?php print $value['status']; ?></td>
    	<td><a href="javascript:;" onClick='editUser("<?php print $value['id']; ?>");'>Edit</a>
		&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="javascript:;" onClick='removeUser("<?php print $value['id']; ?>");'>Remove</a>
		</td>
	</tr>
	<?php 
			}
		}
	?>
	</tbody>
</table>
</div>
</div>