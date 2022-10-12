	<?php require "./header.php"; ?>
		
		<div id="middle">
			<?php
			$link = $_GET["link"];
			$id = $_SESSION["farmerID"];
			if ($link == 1) {
				header("location:logout.php");
			}elseif(empty($link)){
				require "addland.php";
			}elseif($link == 0.1){
				require "addlandform.php";
			}elseif ($link == 2) {
				require "viewcustomer.php";
			}
			elseif ($link == 3) {
				require "vieworders.php";
			}


			?>
			
		</div>
		
		<?php require "../footer.php"; ?>
	