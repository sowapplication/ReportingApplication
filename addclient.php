
<!-- general form elements -->
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Add a new Client</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form role="form" name="clientForm" id="clientForm" method="post" action="javascript:;">
        <div class="form-group">
    		<label>CLIENT NAME</label>
    		<input type="text" name="txtClientName" id="txtClientName" class="form-control" placeholder="Enter Client Name..." required>
    		<input type="hidden" name="txtAction" id="txtAction" value="addClient" required>
    	</div>
    	<div class="form-group">
    		<label>CLIENT LEGAL NAME</label>
    		<input type="text" name="txtClientLegalName" id="txtClientLegalName" class="form-control" placeholder="Enter Client Legal Name..." required>
    	</div>
    	<div class="box-footer">
    		<button type="submit" name="btnSubmit" id="btnSubmit" class="btn btn-primary">Submit</button>
    	</div>
</form>

</div>
<!-- /.box -->