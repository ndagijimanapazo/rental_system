	<?php require "header.php"; ?>
		
		<div id="middle">
			<?php
			$link = $_GET["link"];
			if ($link == 1) {
				header("location:index.php");
			}else{
				?>
				<h2>OVERVIEW OF THE RWANDA AGRICULTURE BOARD</h2>
<p>
The Rwanda Agriculture and Animal Resources Development Board (RAB) is an autonomous body established by LAW N°14/2017 OF 14/04/2017. The law specifies that: RAB has the general mission of championing the agriculture sector development into a knowledge based; technology driven and market oriented industry, using modern methods in crop, animal, fisheries, forestry and soil and water management in food, fibre and fuel wood production and processing
</p>
<p>
RAB was formed from three agriculture agencies, namely the Rwanda Animal Resources Development Authority (RARDA), the Rwanda Agricultural Development Authority (RADA) and the Rwanda Agriculture Research Institute (French acronym: ISAR).
The Government of Rwanda expects this reform to remove the historical legacy that created artificial gaps between research and extension, strengthen the linkage with policy, and establish efficiency in service delivery through institutional integration in the agricultural sector for improved livelihoods of the Rwandan people.

</p>
<p>
This expectation premises on: physical proximity under one administrative structure, using a common standard operating procedure,  which removes institutional boundaries by improving communication, mutual understanding and consensus building between extension, research and policy.
The research-extension-policy nexus is critical for intensifying the focus and increasing the relevance of research and extension to pertinent issues required for acceptable levels of agricultural sector growth and contribution of the sector to overall socioeconomic development process in Rwanda.
</p>

				<?php
			}

			 ?>
		</div>
		<?php require "footer.php"; ?>
	