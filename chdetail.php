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
<BODY class="bg" background="images/bkgnd05.png">
<table class="radi" width="768" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
<tr><td colspan="3"><img src="images/header01.png" border="0"></td></tr>
<tr><td>
<?php
include ("connectdb.php"); 
session_start();
if($_SESSION['usnm'] == "")
{
header("Location: frmin.php");
exit();
}
$usnm=$_SESSION['usnm'];

$rtdt = "SELECT tbmain.nname, tbmain.nposit, tbmain.passc, tboffice.noffice FROM tbmain LEFT JOIN tboffice ON tbmain.noffice = tboffice.coff WHERE tbmain.idno = '".$_SESSION['usnm']."'";
//rtdt = retrive data, rsdt = resource data
$rsdt = mysql_query($rtdt); 
$nrows=mysql_num_rows($rsdt);
$rs=mysql_fetch_array($rsdt);
$nname=$rs['nname'];
$nposit=$rs['nposit'];
$noffice=$rs['noffice'];
echo "<table cellspacing=0 cellpadding=0 width=100% border=0><tr><td align='center'>";
echo "<font face = 'ms sans serif' size = '5'><font color='#FF0000'><b>++ ยินดีต้อนรับ : คุณอยู่ในระบบเรียบร้อยแล้ว ++</b></font><br/><b> $nname  </b>ตำแหน่ง<b> $nposit  </b> <br/>หน่วยงาน<b> $noffice</b></font>
<br/> <font color='#0000CC'><b>:: หน้าจอนี้สำหรับกำหนดรหัสผ่าน (Password) เฉพาะตัวคุณ ในการเข้าระบบ ::</b></font></td></tr>";
?><tr><td align="center">
<table cellspacing="0" cellpadding="0" width="80%" border="0"><tr><td>
<dd><font face = 'ms sans serif' size = '3'><font color="#FF0000"><b><u>โปรดอ่าน</u> !! </b></font>
<br><dd>1. พิมพ์ <b>ตัวอักษรภาษาอังกฤษและตัวเลข</b> ลงในช่องรหัสผ่านใหม่(New) ด้านล่าง ต้องพิมพ์ให้เหมือนกันทั้ง 2 ช่องเพื่อเป็นการยืนยัน <font color="#FF0000">(รหัสผ่านต้องเป็นตัวอักษรภาษาอังกฤษและตัวเลขเท่านั้น <u>ห้าม</u>ใช้อักขระพิเศษและเว้นวรรค) </font>
<br><dd>2. รหัสผ่านควรกำหนดจำนวน<b>ไม่น้อยกว่า 8 ตัว</b>
<br><dd>3. ต้องปกปิดรหัสผ่านเป็นความลับเฉพาะตัวของท่าน <u>ห้าม</u>เปิดเผยแก่ผู้อื่น ป้องกันข้อมูลของท่านถูกนำไปใช้ในทางมิชอบ
<br><dd>4. การเข้าระบบครั้งต่อไป <u>ต้องใช้</u> เลขบัตรประจำตัวประชาชน13หลัก เป็น "ชื่อผู้ใช้(Username)" 
<br><dd>และใช้รหัสผ่านที่ท่านกำหนดใหม่ในครั้งนี้ เป็น "รหัสผ่าน(Password)"
<br><dd>5. <b>กรณีเข้าระบบไม่ได้หรือลืมรหัสผ่าน</b> โปรดติดต่อ <b>ฝ่าย IT โรงพยาบาลควนโดน</b> แจ้งข้อมูลส่วนบุคคล เพื่อให้เจ้าหน้าที่ตรวจสอบความเป็นตัวตนที่ถูกต้อง
</font>
</td></tr></table>
</td></tr>
<tr><td align='center'><br>
<FORM METHOD=POST ACTION = "chpwd_act.php">
<table class="text-center radi2" width="440" border="1" align="center" cellpadding="0" cellspacing="1">
  <tr><td align="center"><br><font face = 'ms sans serif' size = '4' color='#FF0000'><b>!! กำหนดรหัสผ่าน (Password) เฉพาะตัวคุณ <br>และ เข้าระบบอีกครั้ง !!</b></font><br>
  <table width="90%" border="0" align="center">
  <tr> 
<td></br></td>
<div class='container-fluid'>
<td>
  <input type="password" name = "new_pwd" class="form-control" placeholder="กำหนดรหัสผ่านใหม่"> <br>
<input type="password" name = "confirm_pwd" class="form-control" placeholder="ยืนยันรหัสผ่านใหม่"> 
&nbsp; 
<small class="form-text text-muted">หมายเหตุ เหมือนบรรทัดบน</small></td> <br>

  
</tr>
<tr> 
<td colspan="2"><div align="center">
  <p><br>
    <input  class='btn btn-success' name="button_ok" type = "submit" id="button_ok2" value = "ยืนยันรหัสผ่าน" > 
    <input  class='btn btn-warning' name="cancel" type="reset" id="cancel" value="เคลียร์ค่า"> 
    </p>
</div></td>
</tr>
</table>
<br></td></tr></table>
</FORM>
</table>
<center><font face = "ms sans serif" size = "3" color="#FF3333"><b><a class='btn btn-danger' href="logout.php">ออกจากระบบ</a> </b></font></center>
<br>
 </td></tr>
  <tr><td colspan="3"><img src="images/footer01.png" border="0"></td></tr>
 </table>
 </BODY>
</HTML>


