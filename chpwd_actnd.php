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
</style>
<HTML>
<BODY background="images/bkgnd05.png">
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
	 
	 $new_pwd=$_POST['new_pwd'];
	 $confirm_pwd=$_POST['confirm_pwd'];
	if ($usnm ) {	
		$query = "select * from tbmain WHERE (idno= '".$_SESSION['usnm']."')";
		$result  = mysql_query($query);
		$rows = mysql_num_rows($result);
		$rs=mysql_fetch_array($result);
		
		if($rows <= 0)   {
		header("Location: frmin.php");
		exit();
		}
		else {
		if((strcmp($new_pwd,$confirm_pwd) != 0 ) or ($new_pwd == "")){
?>
			<div align="center">
			<table width="480" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
			<tr> <td>
					<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr><td>&nbsp;</td></tr>
					<tr><td align="center"><font face = "ms sans serif" size = "4"><strong><font color="#FF0099">!!</font><font color="#0000CC"> ผิดพลาด : รหัสผ่านที่กำหนดไม่ตรงกันทั้ง 2 ครั้ง</font> <font color="#FF0099">!!</font></strong></font>
							<br><br><font face = "ms sans serif" size = "4"><strong><font color="#0000CC">หรือยังไม่ได้กำหนดรหัสผ่านใหม่</font></strong></font>				
							<br><br>
							<font face = "ms sans serif" size = "4" color="#003300"><b><a class='btn btn-info' href="chdetailnd.php">กำหนดใหม่</a> </b></font>  
							<font face = "ms sans serif" size = "4" color="#FF3333"><b><a class='btn btn-danger' href="logout.php">ออกจากระบบ</a> </b></font>
						   </td></tr>
					<tr><td>&nbsp;</td></tr>
					</table>
			</td></tr>
			</table>
			</div>
        <?php
			}
			else  {
			    $vchn = $rs["chn"]+1;
				$query2 = "update tbmain set passc='$new_pwd', chn='$vchn', dayup=now()  where idno = '$usnm' ";
				$result = mysql_query($query2) or die(mysql_error());
?>        <div align="center">
			<table width="480" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
			<tr> <td>
					<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
					<tr><td>&nbsp;</td></tr>
					<tr><td align="center"><font face = "ms sans serif" size = "4"><strong><font color="#FF0099">:+:</font><font color="#0000CC"> การเปลี่ยนแปลงรหัสผ่าน(Password) เสร็จเรียบร้อยแล้ว</font> <font color="#FF0099">:+:</font></strong></font>
							<br><br><font face = "ms sans serif" size = "4" color="#003300"><strong>โปรดออกจากระบบเพื่อทำการ Login ด้วยรหัสผ่านใหม่ที่ท่านกำหนดเองเมื่อสักครู่นี้ค่ะ</strong></font>
							<br><br><font face = "ms sans serif" size = "4" color="#FF3333"><b> <a class='btn btn-danger' href="logout.php">ออกจากระบบ</a> </b></font>
						   </td></tr>
					<tr><td>&nbsp;</td></tr>
					</table>
			</td></tr>
			</table>
			</div><br><br></td>
        <?php
		mysql_close();
		session_destroy(); 
						}
				}
		}
		else  {
		header("Location: frmin.php");
		exit();
		}
?>
</tr>
  <tr><td colspan="3"><img src="images/footer01.png" border="0"></td></tr>
 </table>
 </BODY>
</HTML>
