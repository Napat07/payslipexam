<?php
session_start();
include ("connectdb.php"); 
if($_SESSION['usnm'] == "")
{
header("Location: frmin.php");
exit();
}
$usnm=$_SESSION['usnm'];
$pswd=$_POST['pswd'];

$rtdt = "SELECT pswadm, cnt, daylgin, idno FROM tbchkadm WHERE pswadm = '".mysql_real_escape_string($_POST['pswd'])."'";
$objQuery = mysql_query($rtdt);
$rs = mysql_fetch_array($objQuery);
$_SESSION["pswd"] = $rs["pswadm"];
session_write_close();
if(!$rs)
{
header("Location: allmonth.php");
mysql_close();
}else {
$vcnt = $rs["cnt"]+1;
$query2 = "update tbchkadm set idno='$usnm', cnt='$vcnt', daylgin=now()  where pswadm = '$pswd' ";
$result = mysql_query($query2) or die(mysql_error());
header("Location: getidchk.php");
mysql_close();
}
?>