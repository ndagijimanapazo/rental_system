	<?php require "../header.php"; ?>
		<div id="top">
			<h1>Land Consolidation And Rental Systemt</h1>
		</div>
		<div id="middle">
			<div id="login">
				<h3>Admin Login Here</h3>
				<form method="post" action="">
					<ul>
						<li><label>User Name</label></li>
						<li><input type="text" name="username"></li>
						<li><label>Password</label></li>
						<li><input type="password" name="password"></li>
						<li><button type="submit" name="log">Log in </button></li>
						<li>
							<?php
							if (isset($_POST["log"])) {
							$a = $_POST["username"];
							$b = $_POST["password"];
							if (empty($a) || empty($b)) {
								echo "<cite>Fill all the fields to proceed!</cite>";
							}elseif (is_numeric($a)) {
								echo "<cite>Please fill text in user name field!</cite>";
							}else{
								$result = $con ->query("SELECT * FROM admin WHERE adminusername='$a' AND adminpassword='$b'");
								if ($result ->num_rows == 1) {
									while ($row = $result ->fetch_object()) {
									$_SESSION["fullname"]=$row ->adminfullname;
									
								}
								header("location:welcome.php");
								}else{
									echo "<cite>Wrong User Name or Password!</cite>";
								}
							}
							}
							 ?>
							
						</li>
						<li><a href="../index.php">Back to Home Page</a></li>
					</ul>
				</form>
			</div>
		</div>
		<div id="bottom">
			
		</div>
		<?php require "../footer.php"; ?>
	