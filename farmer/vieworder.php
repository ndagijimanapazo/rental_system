<table border="1" cellpadding="0" cellspacing="0" width="100%">
	
	<tr>
		<th colspan="100%"><h3>All orders by Customers</h3></th>
	</tr>
	<tr>
		<th>No</th><th colspan="7"><h4>Customer's Bio Data</h4></th>
		<th colspan="100%"><h4>Land Order Information</h4></th>
	</tr>

	<tr>
		<th></th><th>Customer name</th><th>District</th><th>Sector</th><th>Cell</th>
		<th>Village</th><th>Telephone</th><th>ID Number</th>
		<th>LandName/UPI</th><th>Quantity</th><th>Amount(FRW)</th><th>Date Uploaded</th><th>Status</th><th>Action</th>
	</tr>
	<?php 
	$result = $con ->query("SELECT * FROM customers WHERE FarmerID='$id'");
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
		$success = Dear "Customer".$customername.". Payment of ".$Totalamount." for(".$OrderQuantity.")".$OrderUnittype." of ".$orderCommodity." has been received by RAB. Check with ".$customedistrict."".$customesector."RAB Officer in 2 days for your Commodity OR Call 0787751768";
			if ($status ==0) {
				$click = "<a href='?link=3&&status1=0&&success=$success&&tel=$tel&&id=$customerID'>Confirm</a>";
				$status = "Pending";
			}
			if ($status ==1) {
				$click = "<a href='?link=3&&status2=1&&id=$customerID'>Cancel</a>";
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
			<td><?php echo $click; ?></td>
		</tr>
		<?php
		$x++;
		}
	}
	if (isset($_GET["status2"])) {
				
				$id = $_GET["id"];
				$con ->query("UPDATE customers SET orderChecked='0' WHERE customerID='$id'");
				header("location:?link=3");
			}
			
	if (isset($_GET["status1"])) {
				$message = $_GET["success"];
				$tel = $_GET["tel"];
				$id = $_GET["id"];
				$con ->query("UPDATE customers SET orderChecked='1' WHERE customerID='$id'");
				//---------------	start sms
			$data = array(	 	
			"sender"=>"+250787751768",
			"recipients"=>"+25".$tel."",
			"message"=>"$message");
			$url = "https://www.intouchsms.co.rw/api/sendsms/.json";
			$data = http_build_query ($data);
			$username="Kingpazo";
			$password="police1234";					
			//open connection
			$ch = curl_init();
			curl_setopt($ch,CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  
			curl_setopt($ch,CURLOPT_POST,true);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
			$result = curl_exec($ch);
			$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			curl_close($ch);
			$result;
			$httpcode;
			header("location:?link=3");
				
			}
	 ?>
	
</table>