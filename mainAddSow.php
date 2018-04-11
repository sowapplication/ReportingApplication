<!-- general form elements -->
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Add a new SOW</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" name="userForm" id="userForm" method="post" action="javascript:;">
        <div class="form-group">
    		<label>SOW NUMBER</label>    		
    		<input type="text" name="txtSowNumber" id="txtSowNumber" class="form-control" placeholder="Enter Sow Number..." value="<?php print $txtSowNumberValue; ?>">
    		<input type="hidden" name="txtAction" id="txtAction" value="addSow" >
    		<input type="hidden" name="txtSowId" id="txtSowId"  value="<?php print $txtSowIdValue; ?>" >
    	</div>
    	<div class="form-group">
    		<label>SOW NAME</label>
    		<input type="text" name="txtSowName" id="txtSowName" class="form-control" placeholder="Enter Sow Name..."  value="<?php print $txtUserEmailValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>PROJECT TYPE</label>
    		<input type="text" name="txtProjectType" id="txtProjectType" class="form-control" placeholder="Enter Project Type..."  value="<?php print $txtProjectTypeValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>START DATE</label>
    		<input type="text" name="txtStartDate" id="txtStartDate" class="form-control" placeholder="Enter Start Date..."  value="<?php print $txtStartDateValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>END DATE</label>
    		<input type="text" name="txtEndDate" id="txtEndDate" class="form-control" placeholder="Enter End Date..."  value="<?php print $txtEndDateValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>ASSIGNED TO</label>
    		<input type="text" name="txtAssignedTo" id="txtAssignedTo" class="form-control" placeholder="Assigned To..."  value="<?php print $txtAssignedToValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>SOW LINK</label>
    		<input type="text" name="txtSowLink" id="txtSowLink" class="form-control" placeholder="Enter Sow Link..."  value="<?php print $txtSowLinkValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>SOW STATUS</label>
    		<input type="text" name="txtSowStatus" id="txtSowStatus" class="form-control" placeholder="Enter Sow Status..."  value="<?php print $txtSowStatusValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>INPUT FROM</label>
    		<input type="text" name="txtInputFrom" id="txtInputFrom" class="form-control" placeholder="Enter Input From..."  value="<?php print $txtInputFromValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>PRODUCT TYPE</label>
    		<input type="text" name="txtProductType" id="txtProductType" class="form-control" placeholder="Enter Product Type..."  value="<?php print $txtProductTypeValue; ?>">
    	</div>
    	<div class="form-group">
    		<label>CLIENT NAME</label>
    		<input type="text" name="txtClientName" id="txtClientName" class="form-control" placeholder="Enter Client Name..."  value="<?php print $txtClientNameValue; ?>">
    	</div>
    	<div class="box-footer">
    		<button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary">Submit</button>
    	</div>
</form>
</div>
<!-- /.box -->