<h3 style="float: left;" class="btn-add">
	<span class="material-symbols-outlined">add</span>
	<a href="?link=1.1">Add New</a>
</h3>
<table border="1" cellpadding="0" cellspacing="0" width="1000px">
	
	<tr>
		<th colspan="100%"><h3>List of Lands Available</h3></th>
	</tr>

	<tr>
		<th>No</th><th>LandName/UPI</th><th>Land Location</th><th>Phone Number</th><th>category of Land</th><th>Photo</th><th>Manage</th>
	</tr>
	<?php 
	$result = $con ->query("SELECT * FROM land");
	if ($result ->num_rows ==0) {
		echo "";
	}else{
		$x=1;
		while ($row = $result ->fetch_object()) {
			$delid = $row ->landid;
			?>
		<tr>
			<td><?php echo $x; ?></td>
			<td><?php echo $row ->landname; ?></td>
			<td><?php echo $row ->landlocation; ?></td>
			<td><?php echo $row ->phone; ?></td>
			<td><?php echo $row ->landtype; ?></td>
			<td><?php echo "<a href='".$row ->landdimage."' title='".$row ->landdname."'>View Image</a>"; ?></td>
			<td>
				<a href="<?php echo "?link=2&&delid=$delid"; ?>" class="btn-delete">
					<span class="material-symbols-outlined">delete</span>
					Delete
				</a>
			</td>
		</tr>
		<?php
		$x++;
		}
	}
	if(isset($_GET["delid"])) {
		$con = new mysqli("localhost","root","","land");
		$delid = $_GET["delid"];
		$con ->query("DELETE FROM land WHERE landid='$delid'") or die("ERRor");
		header("location:?link=2");
	}
	 ?>
	
</table>