<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="style.css" />
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">

     <?php
		include_once("connection.php");
		if (isset($_POST["btnAdd"])) {
			$id = $_POST["txtID"];
			$name = $_POST["txtName"];
			$err = "";
			if ($id == "") {
				$err .= "<li>Enter Supplier ID, please</li>";
			}
			if ($name == "") {
				$err .= "<li>Enter Supplier Name, please</li>";
			}
			if ($err != "") {
				echo "<li>$err</li>";
			} else {
				include_once("connection.php");
				$sq = "SELECT * FROM supplier where sup_id = '$id' or sup_name = '$name'";
				$result = pg_query($conn, $sq);
				if (pg_num_rows($result) == 0) {
					pg_query($conn, "INSERT INTO supplier (sup_id, sup_name) VALUES ('$id', '$name')" ) or die("Can not connect");
					echo '<meta http-equiv="refresh" content = "0; URL=?page=supplier_management"/>';
				} else {
					echo "<li>Duplicate supplier ID or Name</li>";
				}
			}
		}
		?>

     <div class="container">
     	<h2>Adding Supplier</h2>
     	<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
     		<div class="form-group">
     			<label for="txtID" class="col-sm-2 control-label">Supplier ID(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtID" id="txtID" class="form-control" placeholder="Supplier ID" value='<?php echo isset($_POST["txtID"]) ? ($_POST["txtID"]) : ""; ?>'>
     			</div>
     		</div>
     		<div class="form-group">
     			<label for="txtName" class="col-sm-2 control-label">Supplier Name(*): </label>
     			<div class="col-sm-10">
     				<input type="text" name="txtName" id="txtName" class="form-control" placeholder="Supplier Name" value='<?php echo isset($_POST["txtName"]) ? ($_POST["txtName"]) : ""; ?>'>
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
