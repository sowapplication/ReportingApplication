
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
      <th>Manage</th>
    </tr>
    </thead>
    <tbody>
	
	<?php 
		if (sizeof($userListArray)>0) {
			foreach($userListArray as $key => $value) {
	?>
    <tr>
      <td><?php print $value['userName']; ?></td>
      <td><?php print $value['userEmail']; ?></td>
      <td><?php print $value['userRole']; ?></td>
		<td><a class="user-edit" data="<?php echo  $value['userId'];?>" href="#">Edit</a>
		&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="#">Remove</a>
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