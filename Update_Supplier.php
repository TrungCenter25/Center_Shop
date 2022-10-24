<!-- Bootstrap -->
<link rel="stylesheet" type="text/css" href="style.css" />
     <meta charset="utf-8" />
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <?php
		include_once("connection.php");
		if (isset($_GET["id"])) {
			$id = $_GET["id"];
			$result = pg_query($conn, "SELECT * FROM supplier WHERE sup_id = '$id'");
			$row = pg_fetch_array($result);
			$sup_id = $row["sup_id"];
			$sup_name = $row["sup_name"];
		?>
		<body>
     	<div class="container">
     		<h2>Updating Shop</h2>
     		<form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
     			<div class="form-group">
     				<label for="txtID" class="col-sm-2 control-label">Supplier ID(*): </label>
     				<div class="col-sm-10">
     					<input type="text" name="txtID" id="txtID" class="form-control" placeholder="" readonly value='<?php echo $sup_id; ?>'>
     				</div>
     			</div>
     			<div class="form-group">
     				<label for="txtName" class="col-sm-2 control-label">Supplier Name(*): </label>
     				<div class="col-sm-10">
     					<input type="text" name="txtName" id="txtName" class="form-control" placeholder="" value='<?php echo $sup_name ?>'>
     				</div>
     			</div>


     			<div class="form-group">
     				<div class="col-sm-offset-2 col-sm-10">
     					<input type="submit" class="btn btn-warning" style="color:black" name="btnUpdate" id="btnUpdate" value="Update" />
     					<input type="button" class="btn btn-warning" style="color:black" name="btnIgnore" id="btnIgnore" value="Ignore" onclick="window.location='?page=shop_management'" />

     				</div>
     			</div>
     		</form>
     	</div>
		 </body>
     	<?php
			if(isset($_POST["btnUpdate"])) {
				$id = $_POST["txtID"];
				$name = $_POST["txtName"];
				$err = "";
				if ($name == "") {
					$err . "<li>Enter Shop Name, please</li>";
				}
				if ($err != "") {
					echo "<ul>$err</ul>";
				} else {
					$sq = "SELECT * FROM supplier WHERE sup_id != '$id' and sup_name = '$name'";
					$result = pg_query($conn, $sq);
					if (pg_num_rows($result) == 0) 
					{
						pg_query($conn, "UPDATE supplier SET sup_name = '$name' WHERE sup_id = '$id'");
						echo '<meta http-equiv="refresh" content = "1; URL=?page=supplier_management"/>';
					} else 
					{
						echo "<li>Dulicate supplier Name</li>";
					}
				}
			}
			?>
     <?php
		} else {
			echo '<meta http-equiv="refresh" content = "0; URL=?page=supplier_management"/>';
		}
		?>