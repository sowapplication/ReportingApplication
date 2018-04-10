
<!-- general form elements -->
<div class="row">
<div class="col-md-12">

<div class="box box-info">
<form role="form" name="clientForm" id="clientForm" method="post" action="javascript:;">
<div class="box-header with-border">
  <h3 class="box-title">Add a new Client</h3>
</div>
<!-- /.box-header1 -->
<!-- form start -->
        <div class="form-group">
    		<label>CLIENT NAME</label>
    		<input type="text" name="txtClientName" id="txtClientName" class="form-control" placeholder="Enter Client Name..."  value="<?php print $txtClientNameValue; ?>">
    		<input type="hidden" name="txtAction" id="txtAction" value="addClient" >
    		<input type="hidden" name="txtClientId" id="txtClientId"  value="<?php print $txtClientIdValue; ?>" >
    	</div>
    	<div class="form-group">
    		<label>CLIENT LEGAL NAME</label>
    		<input type="text" name="txtClientLegalName" id="txtClientLegalName" class="form-control" placeholder="Enter Client Legal Name..."  value="<?php print $txtClientLNameValue; ?>" >
    	</div>
    	<div class="box-footer">
    		<button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary">Submit</button>
    	</div>

</form>
</div>
</div>
</div>
<!-- /.box -->