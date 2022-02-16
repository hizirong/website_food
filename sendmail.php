<?php  
session_start();	
require_once("connMysql.php");	 
 //取得登入者帳號及名稱
$inName = $_SESSION["inName"];	
$inAddress = $_SESSION["inAddress"];
$inEmail = $_SESSION["inEmail"];

mb_internal_encoding("utf-8");
$subject=mb_encode_mimeheader("PHP自動發信","utf-8");
$message=mb_encode_mimeheader($inName."您在SHU EAT的訂單已送出囉!","utf-8");
$headers="MIME-Version: 1.0\r\n";
$headers.="Content-type: text/html; charset=utf-8\r\n";
$headers.="From:".mb_encode_mimeheader("SHU_EAT","utf-8")."<SHU_EAT@anywhere.com>\r\n";
mail($inEmail,$subject,$message,$headers);

echo "<script type='text/javascript'>";
echo "alert('訂單已送出');";		
echo "</script>"; 
header("location:index.php");
			
?>