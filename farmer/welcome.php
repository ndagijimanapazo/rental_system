	<?php require "../header.php"; ?>
		<div id="topo">
			<img src="../img/logoo.png">
		</div>
		<div id="seperator">
			<h1>Land Consolidation And Rental System</h1>
		</div>
		<div id="navadmin">
			<nav>
				<ul>
								
					<li><a href="?link=1">Home</a></li>

				</ul>
			</nav>
		</div>
		<div id="middle">
			<?php
			$link = $_GET["link"];
			if ($link == 1) {
				header("location:../index.php");
			}else{
				require "register.php";
			}

			 ?>
			
		</div>
		<div id="bottom">
			
		</div>
		<?php require "../footer.php"; ?>
	