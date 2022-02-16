<?php
  require_once("connMysql.php");
  $level=$_GET["level"];
  $id = $_GET["resturantID"];
  $name = $_GET["resturantName"];
  $foodID=$_GET["foodID"];	        
  //刪除儲存在資料庫的相片資訊
  $sql = "DELETE FROM food WHERE foodID = $foodID ";
  $result=$db_link->query($sql);
  
  //釋放記憶體並關閉資料連接
  //mysqli_free_result($result);
  $db_link->close();
  echo"<script>alert('delete');</script>";	
  header("location:store.php?resturantID=$id&resturantName=$name&level=$level");
?>