<h3 style="float: left;">New Land Owners Registration</h3><br><br>
<form method="post" action="" enctype="multipart/form-data">
	<table width="1000px" height="200px">
		<tr>
			<td><label>LandName/UPI</label></td>
			<td><input type="text" name="landname" required></td>
			<tr>
				<td><label>Land Location:</label></td>
				<td><input type="text" name="landlocation" required></td>
			</tr>

			<td><label>Phone number</label></td>
			<td><input type="text" name="phone" required></td>
		</tr>
		
		<td><label>Category</label></td>
		<td>
			<select name="landtype" requred>
				<option>for rent</option>
				<option>for sale</option>
			</select>
		</td>
		
		<tr>
			<td><label>Photo</label></td>
			<td><input type="file" name="photo" required></td>
			<td></td>
			<td><button type="submit" name="save">Save</button></td>
		</tr>
	</table>
</form>
<?php
if (isset($_POST["save"])) {
	$landname = $_POST["landname"];
	$landlocation = $_POST["landlocation"];
	$phone = $_POST["phone"];
	$landtype = $_POST["landtype"];
	move_uploaded_file($_FILES["photo"]["tmp_name"],"../uploads/" . $_FILES["photo"]["name"]);	
	$photo="../uploads/" . $_FILES["photo"]["name"];
	$con ->query("INSERT INTO land VALUES('','$landname','$landlocation','$phone','$landtype','$photo')");
	header("location:?link=2");

}
?>