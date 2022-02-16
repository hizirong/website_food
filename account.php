<?php
session_start();
	if(isset($_POST["account"])&&isset($_POST["password"]))
	{
		require_once("connMysql.php");
		$inAccount=$_POST["account"];
		$inPassword=$_POST["password"];		
		$sql_query="SELECT *FROM users Where account = '$inAccount'
            AND password = '$inPassword'";
		$result=$db_link->query($sql_query);
		$db_link->close();
					
		if(mysqli_num_rows($result) == 0)
		{
			$db_link->close();
			echo "<script type='text/javascript'>";
			echo "alert('帳號密碼錯誤，請查明後再登入');";
			echo "history.back();";
			echo "</script>";
			
		}
		else
		{
			//將使用者資料加入 Session
			session_start();
			$row = mysqli_fetch_object($result);	
			$_SESSION["inAccount"] = $row->account;	
			$_SESSION["inPassword"] = $row->password;
			$_SESSION["inName"] = $row->name;
			$_SESSION["inPhone"] = $row->phone;
			$_SESSION["inAddress"] = $row->address;
			$_SESSION["inEmail"] = $row->email;
			$_SESSION["inSex"] = $row->sex;
			$_SESSION["inDate"] = $row->date;
			$userid=$row->id;
			$level=$row->level;	
		   			
			mysqli_free_result($result);
			echo "<script type='text/javascript'>";
			echo "alert('登入成功!!');";
			echo "history.go(-2);";
			echo "</script>";
			
			//關閉資料連接	
			mysqli_close($db_link);					
			header("location:index.php?level=$level");
		}		
		
	}	
?>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>登入</title>

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
                <a class="nav-link" href="index.php">首頁
                  <span class="sr-only">(current)</span>
                </a>
              			  
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
	
	<script> 
	  function checkData()
      {
        if (document.myForm.account.value.length =="")
		{
			alert("帳號欄位不可以空白哦！");
			document.myForm.account.focus();
			return false;
		}
		         
        if (document.myForm.password.value.length =="")
		{			
			alert("密碼欄位不可以空白哦！");
			document.myForm.password.focus();
			return false;
		}
        
        document.myForm.submit();
      }
    </script>
	
	<form action="account.php" method="post" name="myForm"  id="myForm" align="center" >
	<fieldset>
  <div class="form-group">
   <br>
   <font size="5">登入</font><br><br>
    <img src='assets/images/account/account.png'>
    <input
      type="text"      
      placeholder="account"
      name="account"
	  id="account"
	  style ="border-radius: 12px; padding:3px 15px"
    />
   <br> <br>
    <img src='assets/images/account/lock.png'>
    <input
      type="password"  
      placeholder="password"
      name="password"
	  id="password"
	  style ="border-radius: 12px; padding:3px 15px"
    />
  <br> <br>
  <input  id="btnsubmit" name="btnsubmit" type="button" value="登入" onclick=checkData() />
  <a href="join.php">加入會員</a></p>
  </fieldset>
</form>
	
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