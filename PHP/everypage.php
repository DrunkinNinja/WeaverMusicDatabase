<html xmlns="http://www.w3.org/1999/xhtml">
	<?php
		// Create connection
		$mysqli=mysqli_connect("mysql51-070.wc1.ord1.stabletransit.com","841513_kaiserkra","Dothard256","841513_kaiserkr");
		
		// Check connection
		if (mysqli_connect_errno()){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
    ?>
</html>