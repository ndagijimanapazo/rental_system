	<?php require "./header.php"; ?>
	<script>
			const nav = document.querySelector("#navadmin");
			nav.style.display='none';
		</script>
		<div id="middle">
			<div id="login">
				<h3>Lands Owner's Log in Panel</h3>
				<form method="post" action="">
					<ul>
						<li><label>&nbsp;Username</label></li>
						<li><input type="text" name="username"></li> 
						<li><label>&nbsp;Password</label></li>
						<li><input type="password" name="password"></li>
						<div align="middle">&nbsp;
						<li>&nbsp;<button type="submit" name="log">Log in </button></li> </div>
						<li>
							<?php
							if (isset($_POST["log"])) {
							$a = $_POST["username"];
							$b = $_POST["password"];
							if (empty($a) || empty($b)) {
								echo "<cite>Fill all the fields to proceed!</cite>";
							}elseif (is_numeric($a)) {
								echo "<cite>Username must be digits!</cite>";
							}else{
								$result = $con ->query("SELECT * FROM farmers WHERE username='$a' AND password='$b'");
								if ($result ->num_rows == 1) {
									while ($row = $result ->fetch_object()) {
									$_SESSION["IDNumber"]=$row ->idnumber;
									$_SESSION["telephone"]=$row ->telephone;
									$_SESSION["farmerID"]=$row ->farmerID;
									$_SESSION["farmerID"] = $row ->farmerID;


									
								}
								header("location:farmer.php");
								}else{
									echo "<cite>Wrong ID Number or telephone Number!</cite>";
								}
							}
							}
							 ?>
							&nbsp;
						</li>
						<li><a href="../index.php">Back to Home Page</a></li> 
						<li>Have no Account? &nbsp;<a href="welcome.php">Register to log in </a></li>
					</ul>
				</form>
			</div>
		</div>
		&nbsp;
		<?php require "../footer.php"; ?>
	