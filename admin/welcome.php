<?php require "header.php"; ?>
		
		<div id="middle">
			<?php
				$link = $_GET["link"];
				if ($link == 1) {
					require "admin.php";
				}elseif ($link == 1.1) {
					require "addadmin.php";
				}elseif ($link == 2) {
					require "land.php";
				}elseif ($link == 2.1) {
					require "addland.php";
				}elseif ($link == 3) {
					require "farmers.php";
				}
				elseif ($link == 4) {
					require "buyers.php";
				}
				elseif ($link == 5) {
					require "monthlyreport.php";
				}
				elseif ($link == 6) {
					require "annualreport.php";
				}
			?>
		</div>
		<?php require "../footer.php"; ?>
	