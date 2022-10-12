
<form method="post" action="" enctype="multipart/form-data">
	<table width="1000px" height="300px">
		<tr>
			<th colspan="100%"><h3 style="float: left;">Please fill this to make order</h3></th>
		</tr>
		<tr>
	<td>Order ID</td><td><input type="text" name="orderID" value="<?php echo $_GET["orderid"]; ?>"></td>
	<td>Land ID</td><td><input type="text" name="landID" value="<?php echo $_GET["landID"]; ?>"></td>
	<td>Farmer ID</td><td><input type="text" name="farmerID" value="<?php echo $_GET["farmerID"]; ?>"></td>

		</tr>
		<tr>
			<td><label>Full Name</label></td>
			<td><input type="text" name="fullname" required></td>
			<td><label>ID Number</label></td>
			<td><input type="text" name="IDNumber"  minlength="16" maxlength="16" required></td>
			<td><label>Telephone</label></td>
			<td><input type="text" name="telephone" required></td>

		</tr>
		<tr>
			
			<td><label>District</label></td>
			<td><input type="text" name="district" required></td>
			<td><label>Sector</label></td>
			<td><input type="text" name="sector" required></td>
			<td><label>Cell</label></td>
			<td><input type="text" name="cell" required></td>
		</tr>
		<tr>
			
			<td><label>Village</label></td>
			<td><input type="text" name="village" required></td>
			<td><label>Size</label></td>
			<td><input type="text" name="size" required></td>
			<td><label><?php echo $_GET["unittype"]; ?> of </label></td>
			<td><input type="text" name="commodity"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="hidden" name="unittype" value="<?php echo $_GET["unittype"]; ?>"><input type="hidden" name="farmertel" value="<?php echo $_GET["farmertel"]; ?>"></td>
			<td><input type="hidden" name="priceperunit" value="<?php echo $_GET["priceperunit"]; ?>"></td><td><input type="text" name="initialsize" value="<?php echo $_GET["size"]; ?>"></td>
			<td></td><td><button type="submit" name="save">Send</button></td>

		</tr>

		
	</table>
</form>
<?php
	if (isset($_POST["save"])) {
		$fullname = $_POST["fullname"];
		$IDNumber = $_POST["IDNumber"];
		$telephone = $_POST["telephone"];
		$district = $_POST["district"];
		$sector = $_POST["sector"];
		$cell = $_POST["cell"];
		$village = $_POST["village"];
		$size = $_POST["size"];
		$commodity = $_POST["commodity"];
		$orderID = $_POST["orderID"];
		$landID = $_POST["landID"];
		$farmerID = $_POST["farmerID"];
		$priceperunit = $_POST["priceperunit"];
		$initialsize = $_POST["initialsize"];
		$unittype = $_POST["unittype"];
		$farmertel = $_POST["farmertel"];


		$day = date('d');
		$month = date('m');
		$year = date('Y');




		if ($size > $initialsize) {
			echo "<cite>Please Customer you have exceeded available size!</cite>";
		}
		else{
			$amount = $priceperunit*$size;
		$con ->query("INSERT INTO customers VALUES('','$orderID','$landID','$farmerID','$fullname','$district','$sector','$cell','$village','$telephone','$IDNumber','$commodity','$unittype','$size','$amount','$day','$month','$year','')");
		$con ->query("UPDATE farmerupload SET size=size-$size WHERE uploadID='$orderID'");
		echo "<cite> Dear ".$fullname." Congratulations, your request for ".$size." ".$unittype." of ".$commodity." worth ".$amount." FRW has been accepted. Please a Land Owner will contact you for further Payment Procedure!</cite>";
		//header("location:?link=1");
		//--------------------Send SMS---------------------
			$sms = "Dear ".$fullname." Congratulations, your request for ".$size." ".$unittype." of ".$commodity." worth ".$amount." FRW from Land Consolidation And Rental Sysytem -RAB has been accepted. You can Press *182*1*1*".$farmertel."* ".$amount."*[PIN]# to complete Payment!. Reach(".$district.",".$sector.",".$cell.",".$village.") upon receiption Or Call Farmer  ".$farmertel;
		//---------------	start sms
			$data = array(	 	
			"sender"=>"+250787751768",
			"recipients"=>"+25".$telephone."",
			"message"=>"$sms");
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
			
		}

	}
  ?>