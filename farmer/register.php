<h3 style="float: left;">Dear Farmer,add your data here!</h3><br><br>
<form method="post" action="" enctype="multipart/form-data">
	<table width="1000px" height="250px">
		
		<tr>
			<td><label>Full Name</label></td>
			<td><input type="text" name="farmerFullname" required></td>
			<td><label>ID Number</label></td>
			<td><input type="text" name="farmerIDNumber"></td>
			<td><label>District</label></td>
			<td><input type="text" name="farmerDistrict"></td>

		</tr>
		<tr>
			<td><label>Sector</label></td>
			<td><input type="text" name="farmerSector" required></td>
			<td><label>Cell</label></td>
			<td><input type="text" name="farmerCell" required></td>
			<td><label>Village</label></td>
			<td><input type="text" name="farmerVillage" required></td>

		</tr>

		<tr>
			<td><label>Telephone</label></td>
			<td><input type="text" name="farmerPhone" required></td>
			<td><label>Username</label></td>
			<td><input type="text" name="username" required></td>
			<td><label>Password</label></td>
			<td><input type="password" name="password" required></td>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>

			<td><button type="submit" name="save">Save</button></td>
		</tr>
	</table>
</form>
<?php
	if (isset($_POST["save"])) {
		$farmerFullname = $_POST["farmerFullname"];
		$farmerIDNumber = $_POST["farmerIDNumber"];
		$farmerSector = $_POST["farmerSector"];
		$farmerDistrict = $_POST["farmerDistrict"];
		$farmerCell = $_POST["farmerCell"];
		$farmerVillage = $_POST["farmerVillage"];
		$farmerPhone = $_POST["farmerPhone"];
		$username = $_POST["username"];
		$password = $_POST["password"];

		$result = $con ->query("SELECT * FROM farmers WHERE telephone='$farmerPhone' AND idnumber='$farmerIDNumber'");
		if ($result ->num_rows > 0) {
			echo "<cite>ID Number or Phone number entered has already been used by you!</cite>";
		}else{
		if (is_numeric($farmerFullname)) {
			echo "<cite>Farmers name must be text!</cite>";
		}else{
		$con ->query("INSERT INTO farmers VALUES('','$farmerFullname','$farmerDistrict','$farmerSector','$farmerCell','$farmerVillage','$farmerPhone','$farmerIDNumber','$username','$password')") or die("Error");
		echo "<cite>Dear ".$farmerFullname.", Your account has been created. You can click home and upload to Add Lands available!</cite>";

		}
		}
	}
  ?>