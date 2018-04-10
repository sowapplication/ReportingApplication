
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">Our Client List</h3>
</div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>Client Name</th>
      <th>Client LegalName</th>
      <th>Manage</th>
    </tr>
    </thead>
    <tbody>
	
	<?php 
		if (sizeof($clientListArray)>0) {
			foreach($clientListArray as $key => $value) {
	?>
    <tr>
      <td><?php print $value['clientName']; ?></td>
      <td><?php print $value['clientLegalName']; ?></td>
		<td><a href="javascript:;" onClick='editClient("<?php print $value['clientId']; ?>");'>Edit</a>
		&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="javascript:;" onClick='removeClient("<?php print $value['clientId']; ?>");'>Remove</a>
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