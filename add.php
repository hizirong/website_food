<?php
$level=$_GET["level"];
if (isset($_POST["addfoodname"])&&($_POST["addfoodprice"]))
	{
			$id = $_GET["resturantID"];
			$name=$_GET["resturantName"];
			//$sql = "SELECT * FROM food WHERE resturantID=$id ";
	
			$addfoodname = $_POST["addfoodname"];
			$addfoodprice = $_POST["addfoodprice"];
			//$addin_id = $_POST["addin_id"];
			require_once("connMysql.php");
			$sql = "SELECT ifnull(max(foodID), 0) + 1 AS foodID FROM food";	
			$result = $db_link->query($sql);
			$addid = mysqli_fetch_object($result)->foodID;
			$sql = "INSERT INTO food(foodID, foodName, foodPrice,resturantID)
			VALUES($addid, '$addfoodname', '$addfoodprice',$id)";
			$db_link->query($sql);    	
			$db_link->close();//mysqli_close($link);    
			header("location:store.php?resturantID=$id&resturantName=$name&level=$level");
			
	}
	
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>購物資訊</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
  <form method="post">
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->
    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.php"><h2>SHU <em>EAT</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.php">首頁
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" >購物資訊</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="list.php">所有店家</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="final.php">購物車</a>
              			  
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>new arrivals</h4>
              <h2>SHU EAT</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>新增菜單</h2>
            </div>
          </div>

 <div class="col-md-7">	
				
			<div class="contact-form"  id="insert">
			 
			 <input name="addfoodname" type="text" class="form-control" id="addfoodname" placeholder="名稱">
			
			 
			 <input name="addfoodprice" type="text" class="form-control" id="addfoodprice" placeholder="價錢">	 		 
			 <fieldset>
                      <button type="submit" id="form-submit" class="filled-button" onClick="clearField(addfoodname,addfoodprice)">新增</button>
             
			 &nbsp&nbsp
                    
             
			 </fieldset>
			 	 
			</div>
			
			
</div>		
			
		
			</div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>final_project&copy;SHU EAT</p>
            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>


    <script> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
	
    </script>
	</form>
  </body>