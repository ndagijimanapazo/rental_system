<h3 style="float: left;" class="btn-add">
	<span class="material-symbols-outlined">add</span>
	<a href="?link=1.1">Add New</a>
</h3>
<table border="1" cellpadding="0" cellspacing="0" width="1050px">
	
	<thead>
		<th colspan="100%">
			<h3>List of Administrators</h3>
		</th>
	</thead>
	<thead>
		<th>No</th>
		<th>Full Name</th>
		<th>Username</th><th>Contact</th>
		<th>Manage</th>
	</thead>
	<?php 
	$result = $con ->query("SELECT * FROM admin");
	if ($result ->num_rows ==0) {
		echo "";
	}else{
		$x=1;
		while ($row = $result ->fetch_object()) {
			?>
		<tr>
			<td><?php echo $x; ?></td>
			<td><?php echo $row ->adminfullname; ?></td>
			<td><?php echo $row ->adminusername; ?></td>
			<td><?php echo $row ->adminphone; ?></td>
			<td>
				<a href="" class="btn-delete">
					<span class="material-symbols-outlined">delete</span>
					Delete
				</a>
			</td>
		</tr>
		<?php
		$x++;
		}
	}
	 ?>
	
</table>