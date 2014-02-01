<?
	require("../everypage.php");
	require("crypt.php");
	$ppass = $_POST['username'];
	$query = "SELECT * FROM  `nealabamamobilitylogins` WHERE  `Username` =  '".$ppass."'";
	$result = $mysqli->query($query);
	while($row = $result -> fetch_assoc()) {
		$dpass = decrypt($row['Password'], $row['Salt']);
	}
	
?>
<script>
	alert("<?=$dpass?>");
	window.location.href = "http://kaiserkrafting.com/test/nealabamamobility.com/PHP/admin_db.php"
</script>