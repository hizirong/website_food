<?php
session_start();	
require_once("connMysql.php");	 
 //取得登入者帳號及名稱
$inName = $_SESSION["inName"];	
$inPhone = $_SESSION["inPhone"];
$inAddress = $_SESSION["inAddress"];
$inEmail = $_SESSION["inEmail"];
//send email
$to="$inEmail";
//$from = "a107222028@live.shu.edu.tw";
//$headers = "From: $from";
$subject="=?utf-8?B?".base64_encode('SHU Eat 訂單明細')."?=";
$message="test";

$headers="MIME-Version:1.0\r\n";
$headers.="Content-type:text/html;charset=utf-8\r\n";

mail($to,$subject,$message,$headers);

?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>購物車</title>

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
	<br>
	<div class="latest-products">
      <div class="container">
        <div class="row">
	<div class="col-md-12">
	<div class="section-heading">
              <h2>訂單明細</h2>  </div>           

	<br>
	<div class="col">
            
              <ul>
                <li>名稱: <?php echo $inName;?></li>
                <li>電話: <?php echo $inPhone;?></li>
                <li>收貨地址: <?php echo $inAddress;?></li>
                <li>Email: <?php echo $inEmail;?></li>
              </ul><br>			  
			  <table border="0" align="center" width="800">  
	<tr bgcolor="#ACACFF" height="30" align="center">    

		<td>商品</td>
        <td>定價</td>
        <td>數量</td>		
        <td>小計</td>		
      </tr>	
	  <br>
       <?php
          //若購物車是空的，就顯示 "目前購物車內沒有任何產品及數量" 訊息
          if (empty($_COOKIE["book_no_list"]))
          {
            echo "<tr align='center'>";
            echo "<td colspan='6'>目前購物車內沒有任何產品及數量！</td>";	
            echo "</tr>";
          }
          else
          {
            //取得購物車資料
            $book_no_array = explode(",", $_COOKIE["book_no_list"]);
            $book_name_array = explode(",", $_COOKIE["book_name_list"]);
            $price_array = explode(",", $_COOKIE["price_list"]);		
            $quantity_array = explode(",", $_COOKIE["quantity_list"]);		
					
            //顯示購物車內容
            $total = 0;			
            for ($i = 0; $i < count($book_no_array); $i++)
            {
              //計算小計
              $sub_total = $price_array[$i] * $quantity_array[$i];
						
              //計算總計
              $total += $sub_total;
						
              //顯示各欄位資料
              //echo "<form method='post' action='change.php?book_no=" . 
                $book_no_array[$i] . "'>";						
              echo "<tr bgcolor='#EDEAB1'>";
              echo "<td align='center'>" . $book_name_array[$i] . "</td>";			
              echo "<td align='center'>$" . $price_array[$i] . "</td>";
              echo "<td align='center'>" . $quantity_array[$i] . "</td>";			
              echo "<td align='center'>$" . $sub_total . "</td>";					
              echo "</tr>";
              //echo "</form>";						
            }
					
            echo "<tr align='right' bgcolor='#EDEAB1'>";
            echo "<td colspan='6' align='left'>總金額 = " . $total . "</td>";	
            echo "</tr>";	
            echo "<tr align='center'>";
            echo "<td colspan='6'>" . "<br><input type='button' value='確認送出'
              onClick=\"javascript:window.open('final.php','_self')\">";
            echo "</td>";	
            echo "</tr>";	
          }
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
