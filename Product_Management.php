    <?php
    if (isset($_SESSION['us']) == false) 
    {
        echo "<script>alert('You need to login')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=?page=login"/>';
    } 
    else 
    {
        if(isset($_SESSION["admin"]) && $_SESSION["admin"]!=1)
        {
        echo "<script>alert('You are not administrator')</script>";
        echo '<meta http-equiv="refresh" content="0;URL=index.php"/>';
        }
        else
        {
    ?>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script>
        function deleteConfirm() {
            if (confirm("Are you sure to delete!")) {
                return true;
            } else {
                return false;
            }
        }
    </script>
    <?php
    include_once("connection.php");
    if (isset($_GET["function"]) == "del") {
        if (isset($_GET["id"])) {
            $id = $_GET["id"];
            $sq = "SELECT Pro_image from product where Product_ID='$id'";
            $res = pg_query($conn,$sq);
            // $result = pg_query($conn,"SELECT pro_image from product where product_id='$id'");
            // $result = pg_query($conn,)
            $row = pg_fetch_array($result);
            $filePic = $row["pro_image"];
            unlink("img/".$filePic);
            pg_query($conn, "delete from product where product_id='$id'");
        }
    }    
    ?>
    <form name="frm" method="post" action="">
    <h1>Product Management</h1>
    <p>
    <a href="?page=add_product">
    <img src="img/add-button.png" alt="" width="16" height="16" border="0"  />Add new</a>	
    </p>
    <table id="tableproduct" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                    <th><strong>No.</strong></th>
                    <th><strong>Product ID</strong></th>
                    <th><strong>Product Name</strong></th>
                    <th><strong>Price</strong></th>
                    <th><strong>Quantity</strong></th>
                    <th><strong>Category ID</strong></th>
                    <th><strong>Supplier ID</strong></th>
                    <th><strong>Image</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>

			<tbody>
            <?php
                include_once("connection.php");
				$No=1;
                $result = pg_query($conn, "SELECT product_id, product_name, price, pro_qty, pro_image, cat_name FROM product a, category b, supplier c
                WHERE a.cat_id = b.cat_id and a.sup_id = c.sup_id")or die("Can not connect");

                while($row = pg_fetch_array($result))
                {
			?>
			<tr>
              <td class="cotcheckbox"><?php echo $No; ?></td>
              <td ><?php echo $row["product_id"] ?></td>
              <td><?php echo $row["product_name"] ?></td>
              <td><?php echo $row["price"] ?></td>
              <td ><?php echo $row["pro_qty"] ?></td>
              <td><?php echo $row["cat_name"] ?></td>
              <td><?php echo $row["sup_name"] ?></td>             
              <td align='center' class='columnfunction'>
                        <img src='img/<?php echo $row["pro_image"] ?>' border='0' width="50" height="50" />
                        </td>
                        <td align='center' class='columnfunction'>
                        <a href="?page=update_product&&id=<?php echo $row['product_id'] ?>">
                        <img src="img/iconpen.png" width="16" height="16" border='0' />
                        </a>
                        </td>
                        <td align='center' class='columnfunction'>
                        <a href="?page=product_management&&function=del&&id=<?php echo $row["product_id"] ?>" onclick="return deleteConfirm()">
                        <img src="img/iconx.png" width="16" height="16" border='0' />
                        </a>
                        </td>
            </tr>
            <?php
            $No++;
                }
			?>
			</tbody>
        
        </table>  

 </form>
<?php
    }
}
    ?>