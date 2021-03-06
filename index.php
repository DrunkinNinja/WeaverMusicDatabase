<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Weaver Music Database</title>
<script src="JS/jquery.js"></script>
<script src="JS/pager.js"></script>
<script src="JS/colorbox/jquery.colorbox-min.js"></script>
<link rel="icon" type="image/ico" href="images/favicon.ico"/>
<link rel="stylesheet" href="CSS/pure.css" />
<link rel="stylesheet" href="CSS/pure-weaver.css" />
<link rel="stylesheet" href="CSS/font.css" />
</head>
<?  
require("everypage.php");
if (!$_POST['sort']){
	$sort = "musicid";
}
else {
	$sort = $_POST['sort'];
}
 
?>
<body class="pure-skin-weaver" style="letter-spacing:1.5px; margin-left:20px; margin-top:20px; background-image:url('images/gradient.png'); background-repeat:repeat-x; color: #FFFFFF">
    <h1 style="color: #d90000; font-family: 'musicos-variant-comicsregular'; font-size: 50px">Weaver High Music Database</h1>
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
                        <option selected value="musicid">Music ID</option>
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
                    <th>Music ID</th>
                    <th>Name</th>
                    <th>Arranger/Composer</th>
                    <th>Publisher</th>
                    <th>Genre</th>
                    <th>Grade</th>
                    <th>Music Link</th>
                </tr>
</thead>
            <tbody>
    <?
	$result = $mysqli->query($squery);
	while($row = $result -> fetch_assoc()) {
		?>
			<tr>
                <td><?php echo $row['musicid']?></td>
            	<td><?php echo $row['Name']?></td>
                <td><?php echo $row['arranger/composer']?></td>
                <td><?php echo $row['publisher']?></td> 
                <td><?php echo $row['genre']?></td>
                <td><?php echo $row['grade']?></td>
                <?          
                    if($row['hassound'] == 1){
                        echo "<td><a href=music/".$row['musicid'].".mp3>mp3</a></td>";
                    }
                    else{
                        echo "<td>Not Available</td>";                
                    }

                ?>
            </tr>
        <?	
	}
?>
</tbody></table>
<br>

<script>
	$('#user').oneSimpleTablePagination({rowsPerPage: 15});
</script>
</div>
</body>
</html>