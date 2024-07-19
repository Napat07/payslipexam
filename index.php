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
</HEAD>
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
<?php
include ("connectdb.php");
$query = "SELECT chn FROM tbmain WHERE (chn>0)";
$result  = mysql_query($query);
$rows = mysql_num_rows($result);

$query2 = "SELECT noman FROM tbmain";
$result2  = mysql_query($query2);
$rows2 = mysql_num_rows($result2);
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
<td align="center"><br><br>
<table width="340" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<td colspan="3" align="center"><font color="#0000CC"><strong>:: กรุณา Login เข้าสู่ระบบ ::</font></strong></td><br>
 <tr>
<form name="form1" method="post" action="inchk.php">
 <td>
<table class="text-center radi2" width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr><td colspan="3">&nbsp;</td></tr>
 <tr>
 <td>
 <div class='container-fluid'>
    <input name="usnm" type="text" class="form-control" id="usnm" size="13" placeholder="เลขบัตรประจำตัวประชาชน 13 หลัก"> <br>
    <input name="pswd" type="password" class="form-control" id="pswd" placeholder="Password"> <br>
	<tr colspan="3">
	<td>
		<input type="submit" class="btn btn-success" name="Submit" value="เข้าสู่ระบบ"><br></br>
	</td>
</tr>
</td>
</div>
</tr>
<tr><td colspan="3" align="center"><font color="#666666" size="-1">** ลืมรหัสผ่านโปรดติดต่อ IT รพ.ควนโดน **</td></tr>

<!-- <tr><td colspan="3">&nbsp;</td></tr>
<tr>
<td colspan="3" align="center"><font color="#0000CC"><strong>:: ��?� Login �������?� ::</font></strong></td>
 </tr>
 <td>&nbsp;</td>
<tr>
<td align="right"><font color="#009900"><b>�?��??�</b><br>(Username)</font></td>
 <td width="6">:</td>
 <td><input name="usnm" type="text" size="13" id="usnm">
<br><font color="#666666" size="-1">[�?��??� 13 ��?]</font></td>
&nbsp;
 </tr>
 <tr>
<td align="right"><font color="#009900"><b>���?�?</b><br>(Password)</font></td>
 <td>:</td>
 <td><input name="pswd" type="password" size="13" id="pswd">
<br><font color="#666666" size="-1">[�����?�� 123456]</font></td>
 </tr>
 &nbsp;
<tr>
 <td>&nbsp;</td>
 <td>&nbsp;</td>
 <td><input type="submit" class="btn btn-success" name="Submit" value="��?"></td>
 </tr>
 </tr>
<br></br>
<tr><td colspan="3" align="center"><font color="#666666" size="-1">** ������?�?�?�?��� 025901169 **</td></tr> -->
</table>
</td>
</form>
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
 <tr><br></tr>
 <tr><td colspan="3" align="center"><br><font color="#666666" size="-1">:: จำนวนผู้ที่ Login และเปลี่ยน Password ครั้งแรกสำเร็จ  
<?php
echo $rows ." คน จำนวนผู้มีสิทธิ์ ". number_format($rows2) . " คน ::";
?>
</font></td></tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" align="center">[ <a href="images/payslipguide5708.pdf"  target=_blank><img src="images/DLicon.png" width="45px" height="45px" border="0"></a>คลิกอ่านคู่มือการใช้งาน || <a href="http://get.adobe.com/reader/"  target=_blank><img src="images/PDFicon.png" width="60px" height="46px" border="1"></a>คลิก Download โปรแกรม Adobe Reader ]</td></tr>
<tr><td colspan="3"><br><img src="images/footer01.png" border="0"></td></tr>
</table>
 </BODY>
 </HTML>