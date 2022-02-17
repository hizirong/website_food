<?php
 session_start();		
 //取得登入者帳號及名稱
 $inAccount = "";
 $level=$_GET["level"];
 if (isset($_SESSION["inAccount"]))
 {
 $inAccount = $_SESSION["inAccount"];				
 }
 else{ header("location:account.php");}
 
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
                <a class="nav-link" href="index.php?level=<?php echo"$level";?>">首頁
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
              <h2>Menu</h2>
            </div>
          </div>
<script> 
    // 增加
    function add(){
        var txt = document.getElementsByClassName("xpf")[0];
        var a = txt.value;
        a++;
        txt.value = a;
		
    }
    
    // 减少
    function sub(){
        var txt = document.getElementsByClassName("xpf")[0];
        var a = txt.value;
        if(a>1){
            a--;
            txt.value = a;
        }else{
            txt.value = 1;
        }
        
    }
	
	
</script>
 <div class="col-md-7">

	<div class="down-content">
		<?php	
          require_once("connMysql.php");
		  $id = $_GET["resturantID"]; 
		  $name = $_GET["resturantName"];	
		if($_GET["level"]==1){		  
		echo"<h4><a href='add.php?resturantID=$id&resturantName=$name&level=$level'>新增</a></h4>";	
		}  
//echo"<input type='button' value='新增' class='filled-button' onClick='test()'/>";
          //篩選出所有產品資料
          $sql = "SELECT * FROM food WHERE resturantID=$id ";
          $result = $db_link->query($sql);
		   
						
          //計算總記錄數
          $total_records = mysqli_num_rows($result);
			for ($i = 0; $i < $total_records; $i++)
          {		  	
			$row = mysqli_fetch_assoc($result);
			echo "<form method='post' action='add_to_car.php?book_no=" . 
             $row["foodID"] . "&book_name=" . urlencode($row["foodName"]) . 
              "&price=" . $row["foodPrice"] . "'>";
			echo "<tr>";				
			echo "<h3><td>" . $row["foodName"] . "</td></h3><br>";
			echo "<h4><td>$" . $row["foodPrice"] . "</td></h4><br>";
			echo"<td><input type='button' onclick='sub()' value='-' ></td>";					
			echo"<td><input type='text' value='1'  class='xpf' name='quantity' size='1' ></td>";				
			echo"<td><input type='button' onclick='add()' value='+' ></td>";
            echo "<td><input type='submit' value='放入購物車'></td>";
			if($_GET["level"]==1){		  
			echo"<h4><a href='editMenu.php?resturantID=$id&resturantName=$name&level=$level&foodID=". $row["foodID"] . "'>修改</a></h4>";	
			echo"<h4><a href='delMenu.php?resturantID=$id&resturantName=$name&level=$level&foodID=". $row["foodID"] . "'>刪除</a></h4>";
			}  
            echo "</tr>";
			echo "</form>";}?>						  					  
    </div>	

</div>		 		  
          <div class="col-md-5">
            <div class="left-content">			
			  <?php 
			  $sqlr = "SELECT * FROM resturant WHERE resturantID=$id ";
			  $result = $db_link->query($sqlr);
			  while ($row = mysqli_fetch_object($result)){?>		
			<h1><?php echo "$row->resturantName";?></h1><br>		
			  地址:<?php echo "$row->resturantAddress";?><br>
			  電話:<?php echo "$row->resturantPhone";}?><br>		
			                       
    <table border="0" align="center" width="500">  
	<tr bgcolor="#ACACFF" height="30" align="center">    

		<td>商品</td>
        <td>價錢</td>
        <td>數量</td>		
        <td>小計</td>
		<td>變更數量</td>	
      	
      </tr>	
	  <br>

       <?php
          //若購物車是空的，就顯示 "目前購物車內沒有任何產品及數量" 訊息
          if (empty($_COOKIE["book_name_list"]))
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
            for ($i = 0; $i < count($book_name_array); $i++)
            {
              //計算小計
              $sub_total = $price_array[$i] * $quantity_array[$i];
						
              //計算總計
              $total += $sub_total;
						
              //顯示各欄位資料
              echo "<form method='post' action='change.php?book_no=" . 
                $book_name_array[$i] . "'>";						
              echo "<tr bgcolor='#EDEAB1'>";		
              echo "<td align='center'>" . $book_name_array[$i] . "</td>";			
              echo "<td align='center'>$" . $price_array[$i] . "</td>";
              echo "<td align='center'><input type='text' name='quantity' value='" . 
                $quantity_array[$i] . "' size='5'></td>";			
              echo "<td align='center'>$" . $sub_total . "</td>";
              echo "<td align='center'><input type='submit' value='修改'></td>";		  
              echo "</tr>";
              echo "</form>";						
            }
					
            echo "<tr align='right' bgcolor='#EDEAB1'>";
            echo "<td colspan='6'>總金額 = " . $total . "</td>";	
            echo "</tr>";	
            echo "<tr align='center'>";
            echo "<td colspan='6'>" . "<br><input type='button' value='退回所有產品'
              onClick=\"javascript:window.open('delete_order.php','_self')\">";
			 echo "<td colspan='6'>" . "<br><input type='button' value='確定'
              onClick=\"javascript:window.open('final.php')\">";
            echo "</td>";	
            echo "</tr>";	
          }
      ?>
	  </table>
	  <br>

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
	  function test()
	  {
		  var id=<?php echo $id; ?>;
		   var name=<?php echo $name; ?>;
		  
		  //var name=<?php echo $name;?>;		  	  
		  window.location.href="add.php?resturantID="+id+"&resturantName="+name;
	  }
	  
    </script>
	
  </body>

</html>
