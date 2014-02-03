<?
	require("../everypage.php");
	$un = $_POST['username'];
	$query = "DELETE FROM nealabamamobilitylogins WHERE Username = '".$un."'";
	$result = $mysqli->query($query);
?>
	<script>
    	window.location.href = "http://kaiserkrafting.com/test/nealabamamobility.com/PHP/admin_db.php"
		alert("User <?=$un?> Deleted Successfully!");
	</script>
