	<?php require "header.php"; ?>
		<div id="middle">
			<div id="lands-info">
				<?php
					$result = $con ->query("SELECT * FROM land l LEFT JOIN farmerupload fu ON(l.landid=fu.landID) JOIN farmers f ON(fu.farmerID=f.farmerID)");
					if ($result ->num_rows ==0) {
						echo "";
					}else{
						while ($row = $result ->fetch_object()) {
							$uploadID = $row ->uploadID;
							$landID = $row ->landID;
							$landLocation = $row->landlocation;
							$farmerID = $row ->farmerID;
							$unittype = $row ->unittype;
							$size = $row ->size;
							$priceperunit = $row ->priceperunit;
							$land = $row ->landname;
							$farmertel = $row ->telephone;
				?>
				<div class="card">
					<div class="card-image">
						<img src="img/<?php echo substr($row ->landimage,0); ?>" width="">
					</div>
					<div class="card-data">
						<h3>
							<?php echo $row ->landname; ?>
						</h3>
						<span class="price">
							<?php echo $row ->priceperunit." FRW"; ?>
						</span>
						<span>
							<span class="material-symbols-outlined">location_on</span>
							<?php echo $row->landlocation; ?>
						</span>
						<span class="land-type">
							<?php echo strtoupper($row ->landtype); ?>
						</span>
						<button>
							<a href="<?php echo "customer/?link=0&&orderid=$uploadID&&landID=$landID&&farmerID=$farmerID&&unittype=$unittype&&size=$size&&priceperunit=$priceperunit&&land=$land&&farmertel=$farmertel"; ?>">
								Order Now
							</a>
						</button>
						
					</div>
				</div>
			<?php
			}
		}
		?>
		</div>
		
		</div>
		
		<?php require "footer.php"; ?>
