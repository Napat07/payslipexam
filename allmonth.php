<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<META content="text/html; charset=utf8" http-equiv=Content-Type>

<META NAME=KEYWORDS CONTENT="Ministry of Public Health, ICT">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<META NAME=AUTHOR CONTENT="ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร, E-mail: ict-moph@health.moph.go.th">

<TITLE>ระบบแจ้งเงินเดือนออนไลน์ โรงพยาบาลควนโดน</TITLE>
<style>
.radi{
	border-radius:34px;
	backdrop-filter:blur(10px);
	background-color:rgba(255,255,255,0.8);
}
.radi2{
	border-radius:10px;
	background-color:rgba(255,255,255,255);
	
}
.bg{
	position:fixed; top:2%; left:0; width: 100%; height:100%;

}
</style>
<HTML>

<BODY class="bg" background="images/bkgnd05.png" >

<table class="radi" width="768" border="0" align="center" cellpadding="0" cellspacing="1">
<tr><td colspan="3"> <img src="images/header01.png" width="768"  align="center"  border="0"></td></tr>
<tr><td>

<?php

session_start(); 
echo " <link href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css' rel='stylesheet'>";
if($_SESSION['usnm'] == "")

{

header("Location: frmin.php");

exit();

}

$usnm=$_SESSION['usnm'];

include ("connectdb.php"); 



$rtdt = "SELECT tbdetail.nauto, tbdetail.idno, tbmain.nname, tbmain.nposit, tboffice.noffice, tbdetail.daypay, tbdetail.mm, tbdetail.notes, tbmonth.nmonth, tbdetail.yy, tbmain.nobank, tbbank.namebank, tbbank.sakhabank, tbdetail.chk

FROM (((tbmain RIGHT JOIN tbdetail ON tbmain.idno = tbdetail.idno) LEFT JOIN tbbank ON tbmain.cbank = tbbank.cbank) LEFT JOIN tboffice ON tbmain.noffice = tboffice.coff) LEFT JOIN tbmonth ON tbdetail.mm = tbmonth.mm

WHERE (((tbdetail.idno)= '".$_SESSION['usnm']."'))  

ORDER BY tbdetail.yy DESC, tbdetail.mm DESC; ";



//rtdt = retrive data, rsdt = resource data



$rsdt = mysql_query($rtdt); 

$nrows=mysql_num_rows($rsdt);

$rs=mysql_fetch_array($rsdt);

$nname=$rs['nname'];

$nposit=$rs['nposit'];

$noffice=$rs['noffice'];
echo "<div class='container-fluid'>";
echo "<br>";
echo "<center><a class='btn btn-primary' href='getidchk.php'> Admin </a> </center><br>";

echo "<table cellspacing=0 cellpadding=3 width=100% border=0><tr><td align='center'>";
?>
<div class="container-fluid radi2" >
	<?php
echo "<font face = 'ms sans serif' size = '4'><b>ยินดีต้อนรับ <br/> $nname  </b>ตำแหน่ง<b> $nposit  </b> <br/>หน่วยงาน<b> $noffice</b><br/></font></td></tr>";
?>
</div>
	<?php
echo "<table cellspacing=0 cellpadding=3 width=100% border=0><tr><td align='center'><br><a class='btn btn-warning' href='chdetailnd.php'>เปลี่ยนรหัสผ่าน</a> <a class='btn btn-danger' href='logout.php'>ออกจากระบบ</a> </td></tr>";

echo "<tr><td align='center'><br><font face = 'ms sans serif' size = '3' color='#990033'><b>!! คลิกชื่อเดือนเพื่อแสดงรายละเอียดใบแจ้งเงินเดือน !!</b></font><br/> ";
?>

<div  >
	<?php
echo "<table  cellspacing=0 cellpadding=3 width=60% border=1 bgcolor='#FFFFFF'><tr align='center' bgcolor='#CCFFFF'>";

echo "<td align='center'><font face = 'ms sans serif' size = '3' color='#0033FF'><b>เดือน</b></font></td>";

echo "<td align='center'><font face = 'ms sans serif' size = '3' color='#0033FF'><b>วันที่โอนเงินเข้าบัญชี</b></font></td>";

echo "<td align='center'><font face = 'ms sans serif' size = '3' color='#0033FF'><b>หมายเหตุ</b></font></td></tr>";

echo "</div>";
?>

</div>
	<?php
mysql_data_seek($rsdt,0);

$i=1;

while($i <= $nrows){

	$rs2=mysql_fetch_array($rsdt);

	$nmonth=$rs2['nmonth'];

	$yy=$rs2['yy'];

	$chk=$rs2['chk'];

	$daypay=$rs2['daypay'];

	$notes=$rs2['notes'];

	if($notes==""){$notes = " ";}	   

	$vrec=$rs2['nauto']; 


?>
<tr>

<?php
//9=ข้อมูลก่อนเข้าจ่ายตรงกรมบัญชีกลาง  0=ข้าราชการ  1=ลูกจ้างประจำ
if($chk==9){
echo "<td align='left'>&nbsp;&nbsp;&nbsp;<font face = 'ms sans serif' size = '3'><a href='viewmm.php?vrec= $vrec '>$nmonth $yy</a></font></td>";
}
elseif($chk==0){
echo "<td align='left'>&nbsp;&nbsp;&nbsp;<font face = 'ms sans serif' size = '3'><a href='viewmmCivil.php?vrec= $vrec '>$nmonth  $yy</a></font></td>";
}
else{
echo "<td align='left'>&nbsp;&nbsp;&nbsp;<font face = 'ms sans serif' size = '3'><a href='viewmmEmployee.php?vrec= $vrec '>$nmonth  $yy</a></font></td>";
}
?>

<td align='right'><font face = 'ms sans serif' size = '3'><?php echo $daypay; ?></font>&nbsp;&nbsp;&nbsp;</td>

<td align='center'><font face = 'ms sans serif' size = '3'><?php echo $notes; ?></font></td></tr>

<?php

$i++;

}

mysql_close(); 

?>
</div>
</table></td></tr></table>

 </td></tr>

 <tr><td colspan="3" align="center"><br><font color="#666666" size="-1">++ ข้อมูลเริ่มต้น เดือนมีนาคม 2556 ++</font><br><br></td></tr>

  <tr><td colspan="3"><img src="images/footer01.png" border="0"></td></tr>

 </table>

 </BODY>

</HTML>





