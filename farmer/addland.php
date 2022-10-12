<h3 style="float: left;" class="btn-add">
	<span class="material-symbols-outlined">add</span>
	<a href="?link=0.1">Add New</a>
</h3>
<table border="1" cellpadding="0" cellspacing="0" width="1000px">
	
	<tr>
		<th colspan="100%"><h3>List of Lands available</h3></th>
	</tr>

	<tr>
		<th>No</th><th>Land Name/UPI</th><th>category</th><th>Photo</th><th>Size</th><th>Price</th><th>Upload Date</th><th>Manage</th>
	</tr>
	<?php 
	$result = $con ->query("SELECT * FROM land l RIGHT JOIN farmerupload fu ON(l.landid=fu.landID) WHERE farmerID='$id'");
	if ($result ->num_rows ==0) {
		echo "";
	}else{
		$x=1;
		while ($row = $result ->fetch_object()) {
			$delid = $row ->uploadID;
			?>
		<tr>
			<td><?php echo $x; ?></td>
			<td><?php echo $row ->landname; ?></td>
			<td><?php echo $row ->landtype; ?></td>
			<td><?php echo "<a href='".$row ->landimage."' title='".$row ->landname."'>View Image</a>"; ?></td>
			<td><?php echo $row ->size." ".$row ->unittype." " ?></td>
			<td><?php echo $row ->priceperunit; ?></td>
			<td><?php echo $row ->uploadday." - ".$row ->uploadmonth." - ".$row ->uploadyear; ?></td>

			<td class="action">
				<a href="<?php echo "?link=0&&delid=$delid"; ?>" class="btn-delete"><span class="material-symbols-outlined">delete</span>Delete</a>
				<a href="<?php echo "?link=0&&delid=$delid"; ?>" class="btn-edit"><span class="material-symbols-outlined">Edit</span>Edit</a>
			</td>
		</tr>
		<?php
		$x++;
		}
	}
	if (isset($_GET["delid"])) {
		$delid = $_GET["delid"];
		$con ->query("DELETE FROM farmerupload WHERE uploadID='$delid'");
		header("location:?link=0");
	}
	 ?>
	
</table>
