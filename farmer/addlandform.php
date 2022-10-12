<?php 
$_SESSION["IDNumber"];
$_SESSION["farmerID"];
?>
<h3 style="float: left;">Add Lands Availbale</h3><br><br>
<form method="post" action="" enctype="multipart/form-data">
	<table width="1000px" height="200px">
		<tr>
			<td><label>Land ID</label></td>
			<td><input type="text" name="farmerID" value="<?php echo $_SESSION["farmerID"]; ?>" ></td>
			<td><label>Land</label></td>
			<td>
				<select name="landID" required>
				<?php 
				$result = $con ->query("SELECT * FROM land");
				while ($row = $result ->fetch_object()) {
				echo "<option value='".$row ->landid."'>".$row ->landname."(".$row ->landtype.")</option>";
				}
				?>				
			</select>
		</td>
		<td><label>Unit Type</label></td>
		<td>
			<select name="unittype" required>
				<option>Meter</option>
				<option>Kilometer</option>
				<option>hectares</option>
			</select>
		</td>
		
	</tr>
	<tr>			
		<td><label>Size</label></td>
			<td><input type="number" name="quanity" required></td>
			<td><label>Price Per land</label></td>
			<td><input type="number" name="priceperunit" required></td>			
			<td></td>
			<td><button type="submit" name="save">Save</button></td>
		</tr>
	</table>
</form>
<?php
	if (isset($_POST["save"])) {
		$farmerID = $_POST["farmerID"];
		$landID = $_POST["landID"];
		$priceperunit = $_POST["priceperunit"];
		$unittype = $_POST["unittype"];
		$day = date('d');
		$month = date('m');
		$year = date('Y');
		$quanity = $_POST["quanity"];		
		$con ->query("INSERT INTO farmerupload VALUES('','$landID','$farmerID','$unittype','$quanity','$priceperunit','$day','$month','$year','')");
		header("location:?link=0");

	}
  ?>