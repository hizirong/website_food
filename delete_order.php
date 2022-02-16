<?php


  //清除購物車資料
  setcookie("book_no_list", "");
  setcookie("book_name_list", "");
  setcookie("price_list", "");
  setcookie("quantity_list", "");	
	
  //導向到shopping_car.php網頁
  echo "<script type='text/javascript'>";
			echo "history.back();";
			echo "</script>";
?>