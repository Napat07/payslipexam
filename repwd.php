<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<META content="text/html; charset=utf8" http-equiv=Content-Type>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<META NAME=KEYWORDS CONTENT="Ministry of Public Health, ICT">
<META NAME=AUTHOR CONTENT="ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร, E-mail: ict-moph@health.moph.go.th">
<TITLE>ระบบแจ้งเงินเดือนออนไลน์ โรงพยาบาลควนโดน</TITLE>
<style>
.radi{
	border-radius:60px;
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
<BODY class="bg "background="images/bkgnd05.png">
<table class="radi" width="768" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
<tr><td colspan="3"><img src="images/header01.png" border="0"></td></tr>
<tr>
<td>
<?php
session_start();
if($_SESSION['usnm'] == "")
{
header("Location: frmin.php");
exit();
}
if($_SESSION['pswd'] == "")
{
header("Location: frmchkadm.php");
exit();
}
$usnm=$_SESSION['usnm'];
$pswd=$_SESSION['pswd'];
include ("connectdb.php"); 
$vid = $_GET['vid'];
?>
<center><font size='3' color='#FF0000'><b>[ :: หน้าจอสำหรับ Admin :: ]</b></font></center>

<?php
if($vid != '')
{
$query1 = "update tbmain set passc='123456', chn='0', dayup=now() where noman='".$vid."'";
$result = mysql_query($query1) or die(mysql_error());

$rsql1 = mysql_query("SELECT * FROM tbmain WHERE noman='".$vid."'"); 
$nrows1=mysql_num_rows($rsql1);
$rsql=mysql_fetch_array($rsql1);
if($nrows1 > 0)
{
$noman=$rsql['noman'];
$id13=$rsql['idno'];
$nname1=$rsql['nname'];
$nposit=$rsql['nposit'];
$coff=$rsql['noffice'];
$nobank=$rsql['nobank'];
$passw=$rsql['passc'];
$rsql2 = mysql_query("SELECT * FROM tboffice WHERE coff='".$coff."'");
$rs2=mysql_fetch_array($rsql2);
$noffice=$rs2['noffice'];
?>
<center>
<br><font face = 'ms sans serif' size = '3' color='#0033FF'><b>!! ดำเนินการ Reset Password เสร็จสิ้นแล้ว !!</b></font><br>
<table class="radi2" cellspacing=0 cellpadding=3 width=50% border=1 bgcolor='#FFFFFF'>
<tr><td><font size = '3'>
<br><font color='#000000'><b>เลขประจำตัว 13 หลัก :</b> <?php echo $id13; ?></font>
<br><font color='#000000'><b>ชื่อ-สกุล :</b> <?php echo $nname1; ?></font>
<br><font color='#000000'><b>ตำแหน่ง :</b> <?php echo $nposit; ?></font>
<br><font color='#000000'><b>หน่วยงาน :</b> <?php echo $noffice; ?></font>
<br><font color='#000000'><b>เลขที่บัญชี :</b> <?php echo $nobank; ?></font>
<br><font color='#0033FF'><b>password :</b> <?php echo $passw; ?></font>
<br>&nbsp;
</font> </td></tr>
</table>
</center>

&nbsp;
<?php
}
}
mysql_close(); 
?>

</td>
</tr>
<tr><td>
<br><center><font face = "ms sans serif" size = "3" ><b> <a class="btn btn-info" href="getidchk.php">ค้นหาต่อ</a></b></font> 
<font face = "ms sans serif" size = "3" ><b><a class="btn btn-primary" href="allmonth.php">กลับหน้าหลัก</a></b></font>
<font face = "ms sans serif" size = "3" ><b><a class="btn btn-danger" href="logout.php">ออกจากระบบ</a></b></font></center>
</td></tr>
 <tr><td colspan="3"><img src="images/footer01.png" border="0"></td></tr>
 </table>
 </BODY>
</HTML>


