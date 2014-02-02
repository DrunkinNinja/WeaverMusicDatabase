<?
	require("../everypage.php");
	require("crypt.php");
	
	$un = $_POST['username'];
	$ppass = $_POST['password'];
	$pass = encrypt($ppass);
	$uid = $_POST['uid'];
	$query = "insert into nealabamamobilitylogins (Username, Password, Salt, UID) values('".$un."', '".$pass[0]."', '".$pass[1]."', '".$uid."')";
	$result = $mysqli->query($query);
?>

	
	<script>
    	window.location.href = "http://kaiserkrafting.com/test/nealabamamobility.com/PHP/admin_db.php"
		alert("User <?=$un?> added successfully!");
	</script>
