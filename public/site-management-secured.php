<?php
	include('site-management/session.php');
	include("../config.php");
   
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$text = mysqli_real_escape_string($db,$_POST['text_input']);
		$area = mysqli_real_escape_string($db,$_POST['input_area']);
		
		$stmt = $mysqli->prepare("UPDATE texts SET text = ? WHERE area = ?");
		
		$stmt->bind_param("ss", $text, $area);
		
		if (!$stmt->execute()) {
			echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
		}
    }
?>
<html>
   
	<head>
		<title>Welcome </title>
	</head>
   
	<body>
		<h1>Welcome <?php echo $username; ?></h1> 
		<h2><a href = "logout.php">Sign Out</a></h2>
	</body>
	
	<?php
		$result = mysqli_query($mysqli, "SELECT * FROM texts");
		
		while ($row = mysqli_fetch_array($result)) {
			echo '<p>'.$row['area'].'</p>';
			echo '<form action="" method="post" name="'.$row['area'].'_form">';
			if ($row && $row['text'] != "") {
				echo '<textarea rows="10" cols="100" name="text_input" placeholder="Text input...">'.$row['text'].'</textarea>';
			} else {
				echo '<textarea rows="10" cols="100" name="text_input" placeholder="Text input..."></textarea>';
			}
			echo '<input name="'.$row['area'].'_input" type="submit" value="Submit" /> <input type="hidden" name="input_area" value="'.$row['area'].'"/> </form>';
		}
	?>
</html>