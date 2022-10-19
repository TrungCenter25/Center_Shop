  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <nav class="navbar navbar-expand-lg navbar-light bg-light" style="float: right; margin-top: 35px;">
  <div class="nav navbar-right" style="background-color:#FFFFFF"><!--header-middle-->
			<div>
					<div class="col-sm-12">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav" style="display: inline-block; ">
                                <?php
                                    if(isset($_SESSION['us']) && $_SESSION['us'] != ""){
                                ?>
                                    <li><a href="?page=update_customer" style="background-color:#FFFFFF;color:#000000">
                                        <i class=""></i>Welcome, <?php echo $_SESSION['us']?></a></li>
                                    <li><a href="?page=logout" style="background-color:#FFFFFF;color:#000000">
                                        <i class=""></i>Logout</a></li>
                                <?php
                                    }
                                    else
                                    {
                                ?>
                                <li><a href="?page=login" style="background-color:#FFFFFF;color:#000000">
                                        <i class=""></i>Login</a></li>
                                <li><a href="?page=register" style="background-color:#FFFFFF;color:#000000">
                                        <i class=""></i>Register</a></li>
                                <?php
                                }
                                ?>
                                
                            </ul>
                        </div>
                    </div>
				</div>
			</div>
		</div>
    </nav>

<div>
<nav class="navbar navbar-expand-lg navbar-light bg-light" >
    <div class="container-fluid">
      <a class="navbar-brand" href="#"><img src="img/logo.png" height="100"; width="100" alt="circle"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?page=content">Home</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?page=product_management"> Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?page=category_management">Category</a>
          </li>
          
        </ul>
        <form class="d-flex" action="?page=search" method="POST">
          <input class="form-control me-2" type="search" placeholder="Search" name="txtSearch" aria-label="Search">
          <button class="btn btn-outline-success" name="btnsearch" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</div>