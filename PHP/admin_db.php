<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Band Database</title>
<script src="../JS/jquery.js"></script>
<script src="../JS/pager.js"></script>
<script src="../JS/colorbox/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="../CSS/pure.css" />
</head>
<?  
require("../everypage.php");
if (!$_POST['sort']){
	$sort = "Name";
}
else {
	$sort = $_POST['sort'];
}

require("templateTop.php"); 
?>
<body style="margin-left:20px; margin-top:20px">
        
        <form action="" method="Post" class="pure-form">
        	<fieldset>
            	<label for="search">Search the Database for </label>
                	<input type="text" name="search">
                <label for="scat">in column </label>
                	<select name="scat">
                        <option value="Name">Name</option>
                        <option value="musicid">Music ID</option>
                        <option value="grade">Music Grade</option>
                        <option value="genre">Genre</option>
                        <option value="publisher">Publisher</option>
                        <option value="arranger">Arranger</option>
                        <option value="composer">Composer</option>
                    </select>
            	<input type="submit" value="Search" class="pure-button">
    		</fieldset>
        </form>

        <form action="" method="post" class="pure-form">
            <fieldset>        
                <label for="sort">Sort By:</label>
                    <select name="sort">
                        <option value="Name">Name</option>
                        <option value="musicid">Music ID</option>
                        <option value="grade">Music Grade</option>
                        <option value="genre">Genre</option>
                        <option value="publisher">Publisher</option>
                        <option value="arranger">Arranger</option>
                        <option value="composer">Composer</option>
                    </select>
                    
                    <button class="pure-button" value="Refresh" onClick="window.location.reload()">Refresh</button>
            </fieldset>
        </form>
        <?
			$search = $_POST['search'];
			$scat = $_POST['scat'];
			if($search){
				$squery = "select * from banddb Where `".$scat."` like '%".$search."%' ORDER BY  `banddb`.`".$sort."` ASC"; 	
			}
			else{
				$squery = "select * from banddb ORDER BY  `banddb`.`".$sort."` ASC";
			}
		?>
        <div style="float:left">
        <table class="pure-table pure-table-striped" style="float:left" id="user">
        	<thead>
                <tr>
                    <th>Name</th>
                    <th>Music ID</th>
                    <th>Music Grade</th>
                    <th>Genre</th>
                    <th>Publisher</th>
                    <th>Arranger</th>
                    <th>Composer</th>
                </tr>
</thead>
            <tbody>
    <?
	$result = $mysqli->query($squery);
	while($row = $result -> fetch_assoc()) {
		?>
        	<? ++$rowCount ?>
			<tr>
            	<td><?=$row['Name']?></td>
                <td><?=$row['musicid']?></td>
                <td><?=$row['grade']?></td>
                <td><?=$row['genre']?></td>
                <td><?=$row['publisher']?></td>
                <td><?=$row['arranger']?></td>
                <td><?=$row['composer']?></td>
                <td><?=$row['grade']?></td>
            </tr>
        <?	
	}
?>
</tbody></table>
<br>
<script>
	$('#user').oneSimpleTablePagination({});
</script>
</div>
</body>
</html>