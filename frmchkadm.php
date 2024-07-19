<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML><HEAD>
<META content="text/html; charset=tis-620" http-equiv=Content-Type>
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
</HEAD>
<?php
include ("connectdb.php");
session_start();
if($_SESSION['usnm'] == "")
{
header("Location: frmin.php");
exit();
}
$usnm=$_SESSION['usnm'];

?>
<BODY class="bg" background="images/bkgnd05.png">
<table class="radi" width="768" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
<tr><td colspan="3"><img src="images/header01.png" border="0"></td></tr>
<tr>
<td width="214" align="center"><br>
<table width="90%" border="0" cellpadding="0" cellspacing="0"><tr><td>
<font color="#000000"><b>วัตถุประสงค์ :</b>
<br>1.เพื่อแจ้งรายละเอียดการโอนเงินดือน ค่าจ้าง ค่าตอบแทนเข้าบัญชีของข้าราชการ ลูกจ้างประจำ และพนักงานราชการของสำนักงานปลัดกระทรวงสาธารณสุข (INTRANET)
<br>2.เพื่อลดการใช้กระดาษ ทดแทนการแจกกระดาษสลิปเงินเดือน
</font></td></tr></table>
</td>
<td align="center">
<br><font color="#FF3333" size="4"><b>!! หากคุณไม่ใช่ ADMIN !!<br>กรุณา <font color="#000000"><a href="allmonth.php">กลับหน้าแรก</a></font> ขอบคุณครับ<b></font><br>
<table class="radi2" width="340" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
 <tr>
<form name="form" method="post" action="chkadm.php">
 <td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
 
<tr><td colspan="3">&nbsp;</td></tr>
<div class='container-fluid'>
<tr>
<td colspan="3" align="center"><font color="#0000CC"><b>:: หน้า Login สำหรับ Admin ::</font></b></td>
 </tr>
 <td><br/></td>
 <tr>
 &nbsp;
 <td align="center"><input name="pswd" type="password" class="form-control" id="pswd" placeholder="Password สำหรับ Admin"></td>
 
</tr>
<td><br/></td>
<tr colspan="3">
<td align="center"><input type="submit" class="btn btn-info" name="Submit" value="เข้าสู่ระบบ Admin"><br></br>
  
 
 <td>&nbsp;</td>
 </tr>
 </tr>
</table>
</td>
</form>
</div>
</tr>
 </table><br>
  </td>
<td width="214" align="center"><br>
<table width="90%" border="0" cellpadding="0" cellspacing="0"><tr><td valign="top">
<font color="#FF0000"><b>โปรดอ่าน :</b>
<br>ผู้ใดเข้าถึงโดยมิชอบซึ่งข้อมูลคอมพิวเตอร์ที่มีมาตรการป้องกันการเข้าถึงโดยเฉพาะ และมาตรการนั้นมิได้มีไว้สําหรับตน ต้องระวางโทษจําคุกไม่เกินสองปี หรือปรับไม่เกินสี่หมื่นบาท หรือทั้งจําทั้งปรับ (มาตรา 7 พระราชบัญญัติว่าด้วยการกระทําความผิดเกี่ยวกับคอมพิวเตอร์ พ.ศ.2550)
</font></td></tr></table>
</td>
   </tr>
<tr><td colspan="3"><br><img src="images/footer01.png" border="0"></td></tr>
</table>
 </BODY>
 </HTML>