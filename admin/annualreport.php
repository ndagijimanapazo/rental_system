<form method="post" action="">
	<table width="800px">
	<tr>
		
		<td>
			<select name="year" required>
				<option value="0">Choose Year</option>
				<?php 
				$y = 2019;
				while ($y <=2040) {
					echo "<option value='".$y."'>".$y."</option>";
					$y++;
				}
				?>
			</select>
		</td>
		<td>
			<button type="submit" name="save">Generate Report</button>
		</td>
	</tr>
</table>
</form>
<br>
<br>
<?php 
if (isset($_POST["save"])) {
	
	$year = $_POST["year"];


?>
<table border="1" cellpadding="0" cellspacing="0" width="1050px">
	
	<tr>
		<th colspan="100%"><h3>All orders by Customers for the year  <?php echo $year; ?></h3></th>
	</tr>
	<tr>
		<th>No</th><th colspan="7"><h4>Customer's Bio Data</h4></th>
		<th colspan="100%"><h4>Land Order Information</h4></th>
	</tr>

	<tr>
		<th></th><th>Customer name</th><th>District</th><th>Sector</th><th>Cell</th>
		<th>Village</th><th>Telephone</th><th>ID Number</th>
		<th>Land Name</th><th>Size</th><th>Amount(FRW)</th><th>Date Uploaded</th><th>Status</th>
	</tr>
	<?php 
	$result = $con ->query("SELECT * FROM customers WHERE orderYear='$year'");
	if ($result ->num_rows ==0) {
		echo "";
	}else{
		$x=1;
		while ($row = $result ->fetch_object()) {
			$customerID = $row ->customerID;
			$status = $row ->orderChecked;
			$customername = $row ->customername;
			$orderCommodity = $row ->orderCommodity;
			$OrderQuantity = $row ->OrderQuantity;
			$OrderUnittype = $row ->OrderUnittype;
			$Totalamount = $row ->Totalamount;
			$customedistrict = $row ->customedistrict;
			$customesector = $row ->customesector;
			$tel = $row ->custometelephone;
		
			if ($status ==0) {
				
				$status = "Pending";
			}
			if ($status ==1) {
				
				$status = "Cleared";
			}


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
			

			<td><?php echo $row ->OrderQuantity." ".$row ->OrderUnittype; ?></td>
			<td><?php echo $row ->Totalamount; ?></td>
			<td><?php echo $row ->orderDay." -".$row ->orderMonth." - ".$row ->orderYear; ?></td>

			<td><?php echo $status; ?></td>
		</tr>
		<?php
		$x++;
		}
	}
	
				
			
	 ?>
	 <tr>
	 	<td></td>
	 	<td colspan="6">
	 		<?php 
	 		$result1 = $con ->query("SELECT * FROM customers WHERE orderYear='$year' AND orderChecked='1'");
	 		$result2 = $con ->query("SELECT SUM(Totalamount) AS amount FROM customers WHERE orderYear='$year' AND orderChecked='1'");
	 		while ($row = $result2 ->fetch_object()) {
	 		$total = $row ->amount;
	 		}
	 		echo "Customers who paid = ".$result1->num_rows." amount(".$total.") FRW";
	 		?>
	 	</td>
	 	<td colspan="6">
	 		<?php 
	 		$result1 = $con ->query("SELECT * FROM customers WHERE orderYear='$year' AND orderChecked='0'");
	 		$result2 = $con ->query("SELECT SUM(Totalamount) AS amount FROM customers WHERE orderYear='$year' AND orderChecked='0'");
	 		while ($row = $result2 ->fetch_object()) {
	 		$total = $row ->amount;
	 		}
	 		echo "Customers not paid = ".$result1->num_rows." amount(".$total.") FRW";
	 		?>
	 	</td>
	 </tr>
	
</table>
<?php }  ?>