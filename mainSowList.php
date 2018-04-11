
<div class="box box-primary">
<div class="box-header with-border">
  <h3 class="box-title">SOW List</h3>
</div>

<div class="box-body">
  <table id="example2" class="table table-bordered table-hover">
    <thead>
    <tr>
      <th>SOW NUMBER</th>
      <th>SOW NAME</th>
      <th>PROJECT TYPE</th>
      <th>START DATE</th>
      <th>END DATE</th>
      <th>ASSIGNED TO</th>
      <th>SOW LINK</th>
      <th>SOW STATUS</th>
      <th>INPUT FROM</th>
      <th>PRODUCT TYPE</th>
      <th>CLIENT NAME</th>
    </tr>
    </thead>
    <tbody>
	
	<?php 
		if (sizeof($sowListArray)>0) {
			foreach($sowListArray as $key => $value) {
	?>
    <tr>
      <td><?php print $value['sowNumber']; ?></td>
      <td><?php print $value['sowName']; ?></td>
      <td><?php print $value['projectType']; ?></td>
      <td><?php print $value['startDate']; ?></td>
      <td><?php print $value['endDate']; ?></td>
      <td><?php print $value['assignedTo']; ?></td>
      <td><?php print $value['sowLink']; ?></td>
      <td><?php print $value['sowStatus']; ?></td>
      <td><?php print $value['inputFrom']; ?></td>
      <td><?php print $value['productType']; ?></td>
      <td><?php print $value['clientName']; ?></td>
    	<td><a href="javascript:;" onClick='editUser("<?php print $value['sowId']; ?>");'>Edit</a>
		&nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="javascript:;" onClick='removeUser("<?php print $value['sowId']; ?>");'>Remove</a>
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