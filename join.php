<?php
session_start();
  require_once("connMysql.php");
  
  if(isset($_POST["account"])&&isset($_POST["password"])&&isset($_POST["name"])&&isset($_POST["sex"])&&isset($_POST["date"])&&isset($_POST["phone"])&&isset($_POST["address"])&&isset($_POST["email"]))
  {
  //取得表單資料
  $account = $_POST["account"];
  $password = $_POST["password"]; 
  $name = $_POST["name"]; 
  $sex = $_POST["sex"];
  $date = $_POST["date"];		
  $phone = $_POST["phone"]; 	
  $address = $_POST["address"];
  $email = $_POST["email"]; 	

			
  //檢查帳號是否有人申請
  $sql_quary = "SELECT * FROM users Where account = '$account'";
  $result = $db_link->query($sql_quary);

  //如果帳號已經有人使用
  if (mysqli_num_rows($result) != 0)
  {
    //釋放 $result 佔用的記憶體
    mysqli_free_result($result);
		
    //顯示訊息要求使用者更換帳號名稱
    echo "<script type='text/javascript'>";
    echo "alert('您所指定的帳號已經有人使用，請使用其它帳號');";
    echo "history.back();";
    echo "</script>";
  }
	
  //如果帳號沒人使用
  else
  {
    //釋放 $result 佔用的記憶體	
    mysqli_free_result($result);
		
    //執行 SQL 命令，新增此帳號
    $sql_quary = "INSERT INTO users (account, password, name, sex, 
            date, phone, address, email) VALUES ('$account', '$password', 
            '$name', '$sex', '$date', '$phone', 
            '$address', '$email')";

	$db_link->query($sql_quary);
	echo "<script type='text/javascript'>";
	echo "alert('註冊成功!!');";
	echo "history.go(-2);";
	echo "</script>";
  }
	
  //關閉資料連接	
  $db_link->close();
  }
?>


<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>會員註冊</title>

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
	
	<script> 
	  function checkData()
      {
        var tStr = document.getElementById('email').value; 
	    var tReg = new RegExp("[a-zA-Z0-9._%-]+@[a-zA-Z0-9._%-]+\.[a-zA-Z]{2,4}"); 
		
		if (document.myForm.account.value.length == 0)
        {
		  document.myForm.account.focus();
          alert("請輸入帳號");
          return false;
        }
        if (document.myForm.account.value.length > 10)
        {
			document.myForm.account.focus();
          alert("帳號不可以超過 10 個字元哦...");
          return false;
        }
        if (document.myForm.password.value.length == 0)
        {
			document.myForm.password.focus();
          alert("請輸入密碼");
          return false;
        }
        if (document.myForm.password.value.length > 10)
        {
			document.myForm.password.focus();
          alert("密碼不可以超過 10 個字元哦...");
          return false;
        }      
        if (document.myForm.name.value.length == 0)
        {
		  document.myForm.name.focus();
          alert("請輸入姓名");
          return false;
        }
		if (document.myForm.phone.value.length == 0)
        {
		  document.myForm.phone.focus();
          alert("請輸入電話");
          return false;
        }	
		if (document.myForm.address.value.length == 0)
        {
		  document.myForm.address.focus();
          alert("請輸入地址");
          return false;
        }	
		if (document.myForm.email.value.length == 0)
        {
		  document.myForm.email.focus();
          alert("請輸入email");
          return false;
        }
		if (!tStr.match(tReg))
        {
		  document.myForm.email.focus();
          alert("請輸入正確的email格式");
          return false;
        }			
		if (document.myForm.date.value.length == 0)
        {
		  document.myForm.date.focus();
          alert("請選擇生日年月日");
          return false;
        }	
        document.myForm.submit();			
      }
    </script>
	
	<form action="join.php" method="post" align="center" name="myForm" id="myForm">
  
	   <br>
	   <font size="5">註冊會員</font><br><br>
		<img src='assets/images/account/account.png'>
		<input
		  type="text"      
		  placeholder="account"
		  name="account"
		  id="account"
		  style ="border-radius: 12px; padding:3px 15px"
		/><br><br>
	   
		<img src='assets/images/account/lock.png'>	
		<input
		  type="password"  
		  placeholder="password"
		  name="password"
		  id="password"
		  style ="border-radius: 12px; padding:3px 15px"
		/><br><br>
		  
		<img src='assets/images/account/name.png'>
		<input
		  type="text"   
		  placeholder="name"
		  name="name"
		  id="name"
		  style ="border-radius: 12px; padding:3px 15px"
		/><br><br>  
	   
		<img src='assets/images/account/phone.png'>
		<input
		  type="text"   
		  placeholder="phone"
		  name="phone"
		  style ="border-radius: 12px; padding:3px 15px"
		/>
		<br><br>
		
		<img src='assets/images/account/home.png'>
		<input
		  type="text"   
		  placeholder="address"
		  name="address"
		  style ="border-radius: 12px; padding:3px 15px"
		/>
		<br><br>
	  
		<img src='assets/images/account/mail.png'>
		<input
		  type="email"   
		  placeholder="email"
		  name="email"
		  id="email"
		  style ="border-radius: 12px; padding:3px 15px"
		/>
		<br><br>
	   
		<img src='assets/images/account/date.jpg' width = "18dp">
		<input
		  type="date"   
		  placeholder="date"
		  name="date"
		  
		  style ="border-radius: 12px; padding:1px 35px;height:32px" 
		/>
		<br><br>
   
		<img src='assets/images/account/gender.png' width = "18dp">   
		<input type="radio" name="sex" value="男" checked>男
		<input type="radio" name="sex" value="女">女
		<br><br>
	  
		<input id="btnsubmit" name="btnsubmit" type="button" value="加入會員" onClick=checkData() />　
		<input type="reset" value="重新填寫">
	</form>
	
	
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	
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

    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/accordions.js"></script>

  </body>

</html>