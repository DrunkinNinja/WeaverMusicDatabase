<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Weaver Music Database</title>
<script src="JS/jquery.js"></script>
<script src="JS/pager.js"></script>
<script src="JS/colorbox/jquery.colorbox-min.js"></script>
<link rel="stylesheet" href="CSS/pure.css" />
</head>
<?  
require("everypage.php");
if (!$_POST['sort']){
	$sort = "Name";
}
else {
	$sort = $_POST['sort'];
}
 
?>
<body style="margin-left:20px; margin-top:20px">
    <h1>Weaver High Music Database</h1>
        <hr>
        <form action="" method="Post" class="pure-form">
        	<fieldset>
            	<label for="search">Search the Database for </label>
                	<input type="text" name="search">
                <label for="scat">in column </label>
                	<select name="scat">
                        <option value="Name">Name</option>
                        <option value="musicid">Music ID</option>
                        <option value="genre">Genre</option>
                        <option value="publisher">Publisher</option>
                        <option value="arranger/composer">Arranger/Composer</option>
                        <option value="grade">Grade</option>
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
                        <option value="genre">Genre</option>
                        <option value="publisher">Publisher</option>
                        <option value="arranger/composer">Arranger/Composer</option>
                        <option value="grade">Grade</option>
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
                    <th>Location</th>
                    <th>Genre</th>
                    <th>Arranger/Composer</th>
                    <th>Publisher</th>
                    <th>Grade</th>
                </tr>
</thead>
            <tbody>
    <?
	$result = $mysqli->query($squery);
	while($row = $result -> fetch_assoc()) {
		?>
			<tr>
            	<td><?=$row['Name']?></td>
                <td><?=$row['musicid']?></td>
                <td><?=$row['location']?></td>
                <td><?=$row['genre']?></td>
                <td><?=$row['arranger/composer']?></td>
                <td><?=$row['publisher']?></td>                
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