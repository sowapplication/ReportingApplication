<!-- general form elements -->
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Add a new User</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" name="userForm" id="userForm" method="post" action="javascript:;">
        <div class="form-group">
    		<label>USER NAME</label>    		
    		<input type="text" name="txtUserName" id="txtUserName" class="form-control" placeholder="Enter User Name..." value="<?php print $txtUserNameValue; ?>">
    		<input type="hidden" name="txtAction" id="txtAction" value="addUser" >
    		<input type="hidden" name="txtUserId" id="txtUserId"  value="<?php print $txtUserIdValue; ?>" >
    	</div>
    	<div class="form-group">
    		<label>USER EMAIL</label>
    		<input type="text" name="txtUserEmail" id="txtUserEmail" class="form-control" placeholder="Enter User Email..."  value="<?php print $txtUserEmailValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>USER ROLE</label>
    		<input type="text" name="txtUserRole" id="txtUserRole" class="form-control" placeholder="Enter User Role..."  value="<?php print $txtUserRoleValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>USER STATUS</label>
    		<input type="text" name="txtUserStatus" id="txtUserStatus" class="form-control" placeholder="Enter User Status..."  value="<?php print $txtUserStatusValue; ?>">
    	</div>
    	<div class="box-footer">
    		<button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary">Submit</button>
    	</div>
</form>
</div>
<!-- /.box -->