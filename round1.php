<?php
			$result = $con ->query("SELECT * FROM product p RIGHT JOIN farmerupload fu ON(p.prodid=fu.productID)");
			if ($result ->num_rows ==0) {
				echo "";
			}else{
			while ($row = $result ->fetch_object()) {
				$uploadID = $row ->uploadID;
				$productID = $row ->productID;
				$farmerID = $row ->farmerID;
				$unittype = $row ->unittype;
				$quantity = $row ->quantity;
				$priceperunit = $row ->priceperunit;
				$product = $row ->prodname;

				?>
			<div id="productimage">
				<img src="img/<?php echo substr($row ->prodimage,0); ?>">
			</div>
			<div id="productdata">
				<table border="0" cellpadding="0" cellspacing="0" width="800px" height="130px">
					<tr>
						<th>Product</th>
						<th>Type</th>
						<th>Size</th>
						<th>Unit Price</th>
						<th>Upload Date</th>
						<th>Action</th>						
					</tr>
					<tr>
						<td><?php echo $row ->prodname; ?></td><td><?php echo $row ->prodtype; ?></td>
						<td><?php echo $row ->quantity." - ".$row ->unittype; ?></td><td><?php $row ->priceperunit; ?></td>
						<td><?php echo $row ->uploadday." - ".$row ->uploadmonth." - ".$row ->uploadyear; ?></td>
						<td><a href="<?php echo "customer/?link=0&&orderid=$uploadID&&productID=$productID&&farmerID=$farmerID&&unittype=$unittype&&quantity=$quantity&&priceperunit=$priceperunit&&product=$product"; ?>">Order Now</a></td>



					</tr>
				</table>
			</div>
			<?php
			}
			}
			?>