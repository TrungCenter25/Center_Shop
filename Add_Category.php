<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="style.css" />
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">

     <?php
		include_once("connection.php");
		if (isset($_POST["btnAdd"])) {
			$id = $_POST["txtID"];
			$name = $_POST["txtName"];
			$des = $_POST["txtDes"];
			$err = "";
			if ($id == "") {
				$err .= "<li>Enter Category ID, please</li>";
			}
			if ($name == "") {
				$err .= "<li>Enter Category Name, please</li>";
			}
			if ($err != "") {
				echo "<li>$err</li>";
			} else {
				include_once("connection.php");
				// $id = htmlspecialchars(pg_real_escape_string($conn, $id));
				// $name = htmlspecialchars(pg_real_escape_string($conn, $name));
				// $des = htmlspecialchars(pg_real_escape_string($conn, $des));
				$sq = "SELECT * FROM Category where Cat_ID = '$id' or Cat_Name = '$name'";
				$result = pg_query($conn, $sq);
				if (pg_num_rows($result) == 0) {
					pg_query($conn, "INSERT INTO Category (Cat_ID, Cat_Name, Cat_Des) VALUES ('$id', '$name', '$des')" ) or die("Can not connect");
					echo '<meta http-equiv="refresh" content = "0; URL=?page=category_management"/>';
				} else {
					echo "<li>Duplicate category ID or Name</li>";
				}
			}
		}
		?>

     <div class="container">
     	<h2>Adding Category</h2>
     	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
     		<div class="form-group">
     			<label for="txtID" class="col-sm-2 control-label">Category ID(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Catepgy ID" value='<?php echo isset($_POST["txtID"]) ? ($_POST["txtID"]) : ""; ?>'>
     			</div>
     		</div>
     		<div class="form-group">
     			<label for="txtName" class="col-sm-2 control-label">Category Name(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Catepgy Name" value='<?php echo isset($_POST["txtName"]) ? ($_POST["txtName"]) : ""; ?>'>
     			</div>
     		</div>

     		<div class="form-group">
     			<label for="txtDescription" class="col-sm-2 control-label">Description(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtDes" id="txtDes" class="form-control" placeholder="Description" value='<?php echo isset($_POST["txtDes"]) ? ($_POST["txtDes"]) : ""; ?>'>
     			</div>
     		</div>

     		<div class="form-group">
     			<div class="col-sm-offset-2 col-sm-10">
     				<input type="submit" class="btn btn-warning" style="color:black" name="btnAdd" id="btnAdd" value="Add new" />
     				<input type="button" class="btn btn-warning" style="color:black" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='?page=category_management'" />

     			</div>
     		</div>
     	</form>
     </div>
