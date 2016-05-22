<html>
<script>
var sno = 0;
function display(){
	
    var name = document.getElementById("name").value;
    var score = document.getElementById("score").value;
	var table = document.getElementById("data");
	
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	
	row.insertCell(0).innerHTML = ++sno;
	row.insertCell(1).innerHTML = name;
	row.insertCell(2).innerHTML = score;
	}
</script>
<body>

	<form action='<?=$_SERVER['PHP_SELF']?>' method='post' class='form' id='form'>
			Name: <input type='text' name='name' id='name'><br><br>
			Score: <select id='score' name='score'>
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					</select><br><br>
			<input type='submit' name='submit' value='Submit' onclick='display()'>
			<input type='button' name='summary' value='Summary' onclick=''>
		</form>
	<?php
	session_start();
	$username = $_SESSION['user'];
		
	if(isset($_POST['submit'])){
		$db = mysqli_connect('localhost','root','','test');
	
		if(isset($_POST['name']) && isset($_POST['score'])){
			$name = $_POST['name'];
			$score = $_POST['score'];
		}
	
		$query = mysqli_query($db,"INSERT INTO scoring VALUES ('".$username."','".$name."','".$score."')");
	
		$row = mysqli_affected_rows($db);
	}
		?>
		
		<table id="data" border="1">
			<thead>
				<tr>
					<th>SNo</th>
					<th>Name</th>
					<th>Score</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
</body>
</html>