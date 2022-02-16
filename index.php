<?php
session_start();		
$level="";
if(isset($_SESSION['inAccount'])){
$level=$_GET["level"];
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

    <title>SHU eat</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--

TemplateMo 546 Sixteen Clothing

https://templatemo.com/tm-546-sixteen-clothing

-->

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-sixteen.css">
    <link rel="stylesheet" href="assets/css/owl.css">

  </head>

  <body>
  <form action="index.php" method="post">

<?php
      require_once("connMysql.php");
      
      
    ?>


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
          <a class="navbar-brand" href="index.php?level=<?php echo"$level";?>"><h2>SHU <em>eat</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" >首頁
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="list.php?level=<?php echo"$level";?>">訂餐</a>
              </li>			  
			  <?php			  
			  	  
			  if(!isset($_SESSION['inAccount'])){
              echo"<li class='nav-item'> <a class='nav-link' href='account.php'>登入</a></li>";			  
			  }
			  if(isset($_SESSION['inAccount'])){
				  $level=$_GET["level"];
              echo"<li class='nav-item'> <a class='nav-link' href='logout.php'>登出</a></li>";}			  
			  ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Best Food</h4>
            <h2>SHU university</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Convenience</h4>
            <h2>Get a meal</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Fast</h4>
            <h2>Spend very little time</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>新店家</h2>
              <a href="list.php?level=<?php echo"$level";?>">查看所有店家<i class="fa fa-angle-right"></i></a>
            </div>
          </div>
		  
		 			
		  <?php 
            require_once("connMysql.php");	
		   
			//取得登入者帳號及名稱
			//session_start();
			if (isset($_SESSION["inAccount"]))
			{
				$inAccount = $_SESSION["inAccount"];				
			}
	  	  				
            $sql = "SELECT * FROM resturant Limit 3";
            $result = $db_link->query($sql);
			
			$db_link->close();
				  
			while ($row = mysqli_fetch_object($result)){
				?>
			<div class="col-md-4">
				<div class="product-item">
				<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?>
				<img src="assets/images/food/<?php echo "$row->resturantPhoto";?>" alt=<?php echo "$row->resturantPhoto";?> width="20px"></a>
				<div class="down-content">
				<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?> <h4> 
				<?php echo"<value='$row->resturantName'>$row->resturantName"; ?></h4></a>
				<p name="resturantAddress">地址：<?php echo "<value='$row->resturantAddress'>$row->resturantAddress";?></p>
				<p name="resturantPhone">電話：<?php echo "<value='$row->resturantPhone'>$row->resturantPhone";?></p>
                
					</div>
				</div>
			</div>		   		   
		    <?php 			
			}?>   
			
        </div>
      </div>
    </div>

    <div class="best-features">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>關於SHU EAT</h2>
            </div>
          </div>
          <div class="col-md-6">
            <div class="left-content">
              <h4>SHU EAT介紹</h4>
              <p>常常不知道等一下要吃什麼嗎？進來看看學校附近有什麼可以吃的吧！</p>
			  <p>組員：</p>
              <ul class="featured-list">
                <li><a>林以庭</a></li>
                <li><a>王梓蓉</a></li>
                <li><a>傅湘庭</a></li>
                <li><a>林欣潔</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-6">
            <div class="right-image">
              <img src="assets/images/Logo.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h4>方便 &amp; 快速 <em>SHU</em> EAT</h4>
                  <p>還在猶豫要吃什麼嗎？快進來看看吧！</p>
                </div>
                <div class="col-md-4">
                  <a href="list.php" class="filled-button">立刻買</a>
                </div>
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
              <p>final project&copy; 2020 SHU EAT</p>
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


    <script language = "text/Javascript"> 
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

</html>
