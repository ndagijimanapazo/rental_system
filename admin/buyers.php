
<table border="1" cellpadding="0" cellspacing="0" width="1050px">
	
	<tr>
		<th colspan="100%"><h3>List of All Customers in the System</h3></th>
	</tr>
	

	<tr>
		<th>No</th><th>Customer name</th><th>District</th><th>Sector</th><th>Cell</th>
		<th>Village</th><th>Telephone</th><th>ID Number</th>
		<th>Item Ordered</th><th>Action</th>
	</tr>
	<?php 
	$result = $con ->query("SELECT * FROM customers");
	if ($result ->num_rows ==0) {
		echo "";
	}else{
		$x=1;
		while ($row = $result ->fetch_object()) {
			$id = $row ->customerID;
			?>
		<tr>
			<td><?php echo $x; ?></td>
			<td><?php echo $row ->customername; ?></td>
			<td><?php echo $row ->customedistrict; ?></td>
			<td><?php echo $row ->customesector; ?></td>
			<td><?php echo $row ->customecell; ?></td>
			<td><?php echo $row ->customevillage; ?></td>
			<td><?php echo $row ->custometelephone; ?></td>
			<td><?php echo $row ->customeidnumber; ?></td>
			<td><?php echo $row ->orderCommodity; ?></td>
			<td><a href="<?php echo "?link=4&&id=$id"; ?>"  class="btn-delete"><span class="material-symbols-outlined">delete</span>Delete</a></td>
			
		</tr>
		<?php
		$x++;
		}
	}
	if (isset($_GET["id"])) {
		$id = $_GET["id"];
		$con ->query("DELETE FROM customers WHERE 	customerID='$id'");
		header("location:?link=4");
	}
	 ?>
	
</table>
