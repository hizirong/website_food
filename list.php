<?php 
            require_once("connMysql.php");										
            define("RECORDS_PER_PAGE",3);
			$level=$_GET["level"];
			$num_pages=1;
			if(isset($_GET['page']))
			{
				$num_pages=$_GET['page'];
			}

			$startRow_records=($num_pages-1)*RECORDS_PER_PAGE;	
			
			$query_RecBoard="SELECT * FROM resturant ";
			$query_limit_RecBoard=$query_RecBoard." LIMIT {$startRow_records}, ".RECORDS_PER_PAGE;
			$RecBoard=$db_link->query($query_limit_RecBoard);
			
			$query_RecBoard1="SELECT * FROM resturant WHERE categoryID ='1' ";
			$query_limit_RecBoard1=$query_RecBoard1." LIMIT {$startRow_records}, ".RECORDS_PER_PAGE;
			$RecBoard1=$db_link->query($query_limit_RecBoard1);
			
			$query_RecBoard2="SELECT * FROM resturant WHERE categoryID ='2'";
			$query_limit_RecBoard2=$query_RecBoard2." LIMIT {$startRow_records}, ".RECORDS_PER_PAGE;
			$RecBoard2=$db_link->query($query_limit_RecBoard2);
			
			$query_RecBoard3="SELECT * FROM resturant WHERE categoryID ='3'";
			$query_limit_RecBoard3=$query_RecBoard3." LIMIT {$startRow_records}, ".RECORDS_PER_PAGE;
			$RecBoard3=$db_link->query($query_limit_RecBoard3);
			
			$query_RecBoard4="SELECT * FROM resturant WHERE categoryID ='4'";
			$query_limit_RecBoard4=$query_RecBoard4." LIMIT {$startRow_records}, ".RECORDS_PER_PAGE;
			$RecBoard4=$db_link->query($query_limit_RecBoard4);
			
			$query_RecBoard5="SELECT * FROM resturant WHERE categoryID ='5'";
			$query_limit_RecBoard5=$query_RecBoard5." LIMIT {$startRow_records}, ".RECORDS_PER_PAGE;
			$RecBoard5=$db_link->query($query_limit_RecBoard5);
			
			$all_RecBoard=$db_link->query($query_RecBoard);
			$total_records=$all_RecBoard->num_rows;
			$total_pages=ceil($total_records/RECORDS_PER_PAGE);	
			
			$all_RecBoard1=$db_link->query($query_RecBoard1);
			$total_records1=$all_RecBoard1->num_rows;
			$total_pages1=ceil($total_records1/RECORDS_PER_PAGE);					
?>

<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>所有店家</title>

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
<form action="list.php" method="post">
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

    
    <div class="products">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="filters">
			
              <ul>	

                  <li class="active" data-filter=".allres"><input type="button" value="All" style="border:none;background-color:white;" onclick="javascript:document.getElementById('all').style='display:block';javascript:document.getElementById('dev').style='display:none';"/></li>
                  <li data-filter=".dev"><input type="button" value="日式" style="border:none;background-color:white;" onclick="javascript:document.getElementById('insert').style='display:block';javascript:document.getElementById('all').style='display:none';javascript:document.getElementById('dev').style='display:block';"/></li>
                  <li data-filter=".des"><input type="button" value="韓式" style="border:none;background-color:white;" onclick="javascript:document.getElementById('insert').style='display:block';javascript:document.getElementById('all').style='display:none';javascript:document.getElementById('dev').style='display:block';"/></li>	  
                  <li data-filter=".gra"><input type="button" value="中式" style="border:none;background-color:white;" onclick="javascript:document.getElementById('insert').style='display:block';javascript:document.getElementById('all').style='display:none';javascript:document.getElementById('dev').style='display:block';"/></li>
				  <li data-filter=".ita"><input type="button" value="義式" style="border:none;background-color:white;" onclick="javascript:document.getElementById('insert').style='display:block';javascript:document.getElementById('all').style='display:none';javascript:document.getElementById('dev').style='display:block';"/></li>
				  <li data-filter=".dri"><input type="button" value="飲料" style="border:none;background-color:white;" onclick="javascript:document.getElementById('insert').style='display:block';javascript:document.getElementById('all').style='display:none';javascript:document.getElementById('dev').style='display:block';"/></li>				               
			  </ul>				  
            </div>
          </div>    
		<div class="col-md-12">
			<div class="filters-content">
			<div class="row grid">		
		<?php		
		while ($row = mysqli_fetch_object($RecBoard)){?> 				
				<div class="col-lg-4 col-md-4 all allres">
				<div class="product-item">
				<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><img src="assets/images/food/<?php echo "$row->resturantPhoto"; ?>" alt=<?php echo "$row->resturantPhoto";?>></a>
					<div class="down-content">
					<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><h4><?php echo "<value='$row->resturantName'>$row->resturantName";?></h4></a>
				<p>地址：<?php echo "<value='$row->resturantAddress'>$row->resturantAddress";?></p>
				<p>電話：<?php echo "<value='$row->resturantPhone'>$row->resturantPhone";?></p>
               
					</div>
				</div>
				
			 </div>	   			
		<?php }?>
		<div class="content-form" style="display:none" id="insert">	
		<?php while($row = mysqli_fetch_object($RecBoard1)){?>					
				<div class="col-lg-4 col-md-4 all dev">
				<div class="product-item">
				<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><img src="assets/images/food/<?php echo "$row->resturantPhoto"; ?>" alt=<?php echo "$row->resturantPhoto";?>></a>
					<div class="down-content">
					<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><h4><?php echo "<value='$row->resturantName'>$row->resturantName";?></h4></a>
				<p>地址：<?php echo "<value='$row->resturantAddress'>$row->resturantAddress";?></p>
				<p>電話：<?php echo "<value='$row->resturantPhone'>$row->resturantPhone";?></p>
				
               
					</div>
				</div>
				
			 </div>	 
					 
		    <?php }while ($row = mysqli_fetch_object($RecBoard2)){?> 				
				<div class="col-lg-4 col-md-4 all des">
				<div class="product-item">
				<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><img src="assets/images/food/<?php echo "$row->resturantPhoto"; ?>" alt=<?php echo "$row->resturantPhoto";?>></a>
					<div class="down-content">
					<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><h4><?php echo "<value='$row->resturantName'>$row->resturantName";?></h4></a>
				<p>地址：<?php echo "<value='$row->resturantAddress'>$row->resturantAddress";?></p>
				<p>電話：<?php echo "<value='$row->resturantPhone'>$row->resturantPhone";?></p>
               
					</div>
				</div>
				
			 </div>	   		   
		    <?php }while ($row = mysqli_fetch_object($RecBoard3)){?> 	
				<div class="col-lg-4 col-md-4 all gra">
				<div class="product-item">
				<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><img src="assets/images/food/<?php echo "$row->resturantPhoto"; ?>" alt=<?php echo "$row->resturantPhoto";?>></a>
					<div class="down-content">
					<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><h4><?php echo "<value='$row->resturantName'>$row->resturantName";?></h4></a>
				<p>地址：<?php echo "<value='$row->resturantAddress'>$row->resturantAddress";?></p>
				<p>電話：<?php echo "<value='$row->resturantPhone'>$row->resturantPhone";?></p>
				
               
					</div>
				</div>
				
			 </div>	   		   
		    <?php }while ($row = mysqli_fetch_object($RecBoard4)){?> 	
				<div class="col-lg-4 col-md-4 all ita">
				<div class="product-item">
				<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><img src="assets/images/food/<?php echo "$row->resturantPhoto"; ?>" alt=<?php echo "$row->resturantPhoto";?>></a>
					<div class="down-content">
					<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><?php echo "<value='$row->resturantName'>$row->resturantName";?></h4></a>
				<p>地址：<?php echo "<value='$row->resturantAddress'>$row->resturantAddress";?></p>
				<p>電話：<?php echo "<value='$row->resturantPhone'>$row->resturantPhone";?></p>
               
					</div>
				</div>
				
			 </div>	   		   
		    <?php }while ($row = mysqli_fetch_object($RecBoard5)){?> 	
				<div class="col-lg-4 col-md-4 all dri">
				<div class="product-item">
				<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><img src="assets/images/food/<?php echo "$row->resturantPhoto"; ?>" alt=<?php echo "$row->resturantPhoto";?>></a>
					<div class="down-content">
					<?php echo"<a href='store.php?resturantID=$row->resturantID&resturantName=$row->resturantName&level=$level'>";?><h4><?php echo "<value='$row->resturantName'>$row->resturantName";?></h4></a>
				<p>地址：<?php echo "<value='$row->resturantAddress'>$row->resturantAddress";?></p>
				<p>電話：<?php echo "<value='$row->resturantPhone'>$row->resturantPhone";?></p>
				
               
					</div>
				</div>
				
			 </div>	   		   
			<?php }?>			
		</div>
		</div>
	</div>
</div>			
          <div class="col-md-12">
            <ul class="pages">		
			<div class="content-form" id="all">	
              <li class="active" data-filter=".allres">			  
			  <?php 					  
						  for($i=1;$i<=$total_pages;$i++)
						  {
							  if($i!=$num_pages){echo"<li><a href='?page=".$i."'>".$i."</a></li>";}
							  else{echo"<li><a>".$i."</a></li>";}
							  
						  }?></li></div>	
			<div class="content-form" style="display:none" id="dev">	
			<li class="active" data-filter=".dev">			  
			  <?php 					  
						  for($i=1;$i<=$total_pages1;$i++)
						  {
							  echo"<li><a>".$i."</a></li>";
						  }$db_link->close();?> </li></div>						  						 
            </ul>
          </div>
        </div>
      </div>
    </div>

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <p>Final_project &copy; SHU EAT</p>
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


  </body>

</html>
