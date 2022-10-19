<link rel="stylesheet" type="text/css" href="style.css"/>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/responsive.css">
<script src="js/jquery-3.2.0.min.js"/></script>
<script src="js/jquery.dataTables.min.js"/></script>
<script src="js/dataTables.bootstrap.min.js"/></script>
<br>

<?php
    if (isset($_POST['btnLogin']))
	{
		$us = $_POST['txtUsername'];
		$pa = $_POST['txtPass'];
		$us = mysqli_real_escape_string($conn, $us);

		$err = "";
		if($us=="")
		{
			$err .= "Please enter your username<br/>";
		}
		if($pa=="")
		{
			$err .= "Please enter your password<br/>";
		}

		if($err !="")
		{
			echo $err;
		}
		else
		{	

			include_once("connection.php");
			$pass = md5($pa);
			$res = mysqli_query($conn, "SELECT Username, Password, state FROM Customer WHERE Username = '$us' AND Password = '$pass'")
			or die(mysqli_error($conn));
			$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
			if(mysqli_num_rows($res)==1)
			{
				$_SESSION["us"] = $us;
				$_SESSION["admin"] = $row["state"];
				echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
			}
			else
			{
				echo "Inconnected";
			}
		}
	}
?>
<section class="Form">
	<div clas="row">
		<div class="col-lg-5">
			<img src="img/2.png" width="1000" class="img-fluid" alt="">
		</div>
	</div>
</section>
<h1>Sign in</h1>
<form id="form1" name="form1" method="POST" action="">
<div class="row">
    <div class="form-group">				    
        <label for="txtUsername" class="col-sm-6 control-label">Username:  </label>
		<div class="col-sm-10">
		      <input type="text" name="txtUsername" id="txtUsername" class="form-control" placeholder="Username" value=""/>
		</div>
      </div>  
      
    <div class="form-group">
		<label for="txtPass" class="col-sm-6 control-label">Password:  </label>			
		<div class="col-sm-10">
		      	<input type="password" name="txtPass" id="txtPass" class="form-control" placeholder="Password" value=""/>
		</div>
	</div> 
	<div class="form-group"> 
        <div class="col-sm-1"></div>
        <div class="col-sm-6">
        	<input type="submit" name="btnLogin"  class="btn btn-warning" style="color:black" id="btnLogin" value="Login"/>
            <input type="submit" name="btnCancel"  class="btn btn-warning" style="color:black" id="btnLogin" value="Cancel"/>
		</div>  
	</div>
 </div>
<br>
<br>
</form>
   