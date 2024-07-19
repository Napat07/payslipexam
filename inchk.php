<?php
session_start();
include ("connectdb.php"); 
$rtdt = "SELECT idno, passc, nname, chn FROM tbmain WHERE idno = '".mysql_real_escape_string($_POST['usnm'])."'and passc = '".mysql_real_escape_string($_POST['pswd'])."'";
$objQuery = mysql_query($rtdt);
$rs = mysql_fetch_array($objQuery);
if(!$rs)
{
header("Location: frminwrong.php");
}else {
$_SESSION["usnm"] = $rs["idno"];
session_write_close();
if ($rs["chn"]==0){
header("location:chdetail.php");
mysql_close();
}else{
header("location:allmonth.php");
mysql_close();
}
}
?>