<?php require "../header.php"; ?>
		<div id="navadmin">
			<nav > 
				<ul >
								
					<li ><a  href="?link=1">Home</a></li>

				</ul>
			</nav>
		</div>
		<div id="middle">
			<?php
			$link = $_GET["link"];
			if ($link == 1) {
				header("location:logout.php");
			}else{
				require "order.php";
			}

			 ?>
			
		</div>
		<div id="bottom">
			
		</div>
		<?php require "../footer.php"; ?>
	