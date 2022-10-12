<h3 style="float: left;" class="btn-add">
	<span class="material-symbols-outlined">add</span>
	<a href="?link=1.1"> New Admin Form</a>
</h3>
<form method="post" action="" enctype="multipart/form-data">
	<table width="1000px" height="200px">
		<tr>
			<td><label>Full Name</label></td>
			<td><input type="text" name="adminfullname" required></td>
			<td><label>User Name</label></td>
			<td><input type="text" name="adminusername"></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><input type="password" name="adminpassword1" required></td>
			<td><label>Confirm password</label></td>
			<td><input type="password" name="adminpassword2"></td>
		</tr>

		<tr>
			<td><label>Telephone</label></td>
			<td><input type="text" name="adminphone" required></td>
			<td></td>
			<td><button type="submit" name="save">Save</button></td>
		</tr>
	</table>
</form>
<?php
	if (isset($_POST["save"])) {
		$adminfullname = $_POST["adminfullname"];
		$adminusername = $_POST["adminusername"];
		$adminpassword1 = $_POST["adminpassword1"];
		$adminpassword2 = $_POST["adminpassword2"];
		$adminphone = $_POST["adminphone"];
		if ($adminpassword1 !=$adminpassword2) {
			echo "";
		}else{
		$con ->query("INSERT INTO admin VALUES('','$adminfullname','$adminusername','$adminpassword1','$adminphone')");
		header("location:?link=1");
		}

	}
  ?>