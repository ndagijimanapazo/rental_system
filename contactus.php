	<?php require "header.php"; ?>
		
		<div id="middle">
			<?php
				$link = $_GET["link"];
				if ($link == 1) {
					header("location:index.php");
				}
				else
				{
			?>
					<form method="post" action="">
						<table>
							<tr>
								<td><label>Telephone:</label></td>
							</tr>
							<tr>
								<td><input type="text" name="telephone" id="contact" required></td>
							</tr>
							<tr>
								<td><label>Subject:</label></td>
							</tr>
							<tr>
								<td><input type="text" name="subject" id="contact" required></td>
							</tr>
							<tr>
								<td><label>Message:</label></td>
							</tr>
							<tr>
								<td><textarea name="message" id="contact1" required></textarea></td>
							</tr>
							<tr>
								<td><label>&nbsp;</label></td>
							</tr>
							<tr>
								<td><button type="submit" name="save">Send SMS</button></td>
							</tr>
						</table>
					</form>
					<?php
						if (isset($_POST["save"])) {
							$telephone = $_POST["telephone"];
							$subject = $_POST["subject"];
							$message = $_POST["message"];
							$fulltext = "Sent by:".$telephone." ".$subject.":".$message;
							echo "Thank you for contact us we will get back to you soon..";
							$data = array(	 	
							"sender"=>"+250787751768",
							"recipients"=>"+25".$telephone."",
							"message"=>"$fulltext");
							$url = "https://www.intouchsms.co.rw/api/sendsms/.json";
							$data = http_build_query ($data);
							$username="Kingpazo";
							$password="police1234";					
							//open connection
							$ch = curl_init();
							curl_setopt($ch,CURLOPT_URL, $url);
							curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);  
							curl_setopt($ch,CURLOPT_POST,true);
							curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
							curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
							curl_setopt($ch,CURLOPT_POSTFIELDS, $data);
							$result = curl_exec($ch);
							$httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
							curl_close($ch);
							$result;
							$httpcode;
						}
					?>
					<?php
				} ?>
		</div>
		<?php require "footer.php"; ?>
		