<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>訂單明細</title>

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
<form action="final.php" method="post">
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
              <li class="nav-item">
                <a class="nav-link" href="list.php">所有店家</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" >購物車</a>
              			  
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    
	<br>
	<div class="latest-products">
      <div class="container">
        <div class="row">
	<div class="col-md-12">
	<div class="section-heading">
              <h2>訂單明細</h2>  </div>           

	<br>
	<div class="col">
            <table border="1" bgcolor="white" rules="cols" align="center" cellpadding="5">
    <tr height="25">
				<td colspan="4" align="Center" bgcolor="#CCCC00">個人資料</td>
    </tr>
    <tr height="25">
      <td colspan="4">姓名：<u><?php //echo $_COOKIE["name"] ?>
        <?php //for ($i = 0; $i <= 100 - 2* strlen($_COOKIE["name"]); $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">電話：
        <u><?php for ($i = 0; $i <= 100; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">地址：
        <u><?php for ($i = 0; $i <= 100; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        配送方式：自取
      </td>
    </tr>
    <tr height="25">
      <td colspan="4">
        付款方式：現金
      </td>
    </tr>
    
    <tr height="25">
      <td colspan="4">
        支付總金額：<u><?php for ($i = 0; $i <= 89; $i++) echo "&nbsp;"; ?></u>
      </td>
    </tr>   
    <tr height="25">
      <td colspan="4" align="center" bgcolor="#CCCC00">訂單細目</td>
    </tr>
    <tr height="25" align="center" bgcolor="FFFF99">
      <td>餐點</td>
      <td>價錢</td>
      <td>數量</td>
      <td>小計</td>																
    </tr>			
      <?php
        //取得購物車資料
        $book_name_array = explode(",", $_COOKIE["book_name_list"]);
        $price_array = explode(",", $_COOKIE["price_list"]);		
        $quantity_array = explode(",", $_COOKIE["quantity_list"]);		
					
        //顯示購物車內容
        $total = 0;		
        for ($i = 0; $i < count($book_name_array); $i++)
        {
          //計算小計
          $sub_total = $price_array[$i] * $quantity_array[$i];
					
          //計算總計
          $total += $sub_total;
					
          //顯示各欄位資料
          echo "<tr>";	
          echo "<td align='center'>" . $book_name_array[$i] . "</td>";			
          echo "<td align='center'>$" . $price_array[$i] . "</td>";
          echo "<td align='center'>" . $quantity_array[$i] . "</td>";
          echo "<td align='center'>$" . $sub_total . "</td>";
          echo "</tr>";
        }
        echo "<tr align='right' bgcolor='#CCCC00'>";
        echo "<td colspan='4'>總金額 = " . $total . "</td>";	
        echo "</tr>";	
      ?>
    </table>
     
	</div>
	</div>
	</div>
	  </div>
	</div>



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
