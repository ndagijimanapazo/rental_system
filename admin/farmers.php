
<table border="1" cellpadding="0" cellspacing="0" width="1050px">
	
	<tr>
		<th colspan="100%"><h3>List of Owner's Land</h3></th>
	</tr>
	<tr>
		<th>No</th><th colspan="7"><h4>Farmers Bio Data</h4></th>
		<th colspan="100%"><h4>Land Information</h4></th>
	</tr>

	<tr>
		<th></th><th>Owner</th><th>District</th><th>Sector</th><th>Cell</th>
		<th>Village</th><th>Telephone</th><th>ID Number</th>
		<th>Land Name & Api</th><th>Size</th><th>Unit Price</th><th>Date Uploaded</th><th>Action</th>
	</tr>
	<?php 
	$result = $con ->query("SELECT * FROM farmers f JOIN farmerupload fu ON(f.farmerID=fu.farmerID) JOIN land l ON(fu.landID=l.landid)");
	if ($result ->num_rows ==0) {
		echo "";
	}else{
		$x=1;
		while ($row = $result ->fetch_object()) {
			?>
		<tr>
			<td><?php echo $x; ?></td>
			<td><?php echo $row ->farmername; ?></td>
			<td><?php echo $row ->district; ?></td>
			<td><?php echo $row ->sector; ?></td>
			<td><?php echo $row ->cell; ?></td>
			<td><?php echo $row ->village; ?></td>
			<td><?php echo $row ->telephone; ?></td>
			<td><?php echo $row ->idnumber; ?></td>
			<td><?php echo $row ->landname ; ?></td>
			<td><?php echo $row ->size." ".$row ->unittype; ?></td>
			<td><?php echo $row ->priceperunit; ?></td>
			<td><?php echo $row ->uploadday." -".$row ->uploadmonth." - ".$row ->uploadyear; ?></td>


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