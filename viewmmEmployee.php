<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<META content="text/html; charset=utf8" http-equiv=Content-Type>
<META NAME=KEYWORDS CONTENT="Ministry of Public Health, ICT">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<META NAME=AUTHOR CONTENT="ศูนย์เทคโนโลยีสารสนเทศและการสื่อสาร, E-mail: ict-moph@health.moph.go.th">
<TITLE>ระบบแจ้งเงินเดือนออนไลน์ โรงพยาบาลควนโดน</TITLE>

<HTML>
<?php
include ("connectdb.php"); 
$vrec = $_GET['vrec']; 

function num2thai($number){
$t1 = array("ศูนย์", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
$t2 = array("เอ็ด", "ยี่", "สิบ", "ร้อย", "พัน", "หมื่น", "แสน", "ล้าน");
$zerobahtshow = 0; // ในกรณีที่มีแต่จำนวนสตางค์ เช่น 0.25 หรือ .75 จะให้แสดงคำว่า ศูนย์บาท หรือไม่ 0 = ไม่แสดง, 1 = แสดง
(string) $number;
$number = explode(".", $number);
if(!empty($number[1])){
if(strlen($number[1]) == 1){
$number[1] .= "0";
}else if(strlen($number[1]) > 2){
if($number[1]{2} < 5){
$number[1] = substr($number[1], 0, 2);
}else{
$number[1] = $number[1]{0}.($number[1]{1}+1);
}
}
}

for($i=0; $i<count($number); $i++){
$countnum[$i] = strlen($number[$i]);
if($countnum[$i] <= 7){
$var[$i][] = $number[$i];
}else{
$loopround = ceil($countnum[$i]/6);
for($j=1; $j<=$loopround; $j++){
if($j == 1){
$slen = 0;
$elen = $countnum[$i]-(($loopround-1)*6);
}else{
$slen = $countnum[$i]-((($loopround+1)-$j)*6);
$elen = 6;
}
$var[$i][] = substr($number[$i], $slen, $elen);
}
} 

$nstring[$i] = "";
for($k=0; $k<count($var[$i]); $k++){
if($k > 0) $nstring[$i] .= $t2[7];
$val = $var[$i][$k];
$tnstring = "";
$countval = strlen($val);
for($l=7; $l>=2; $l--){
if($countval >= $l){
$v = substr($val, -$l, 1);
if($v > 0){
if($l == 2 && $v == 1){
$tnstring .= $t2[($l)];
}elseif($l == 2 && $v == 2){
$tnstring .= $t2[1].$t2[($l)];
}else{
$tnstring .= $t1[$v].$t2[($l)];
}
}
}
}
if($countval >= 1){
$v = substr($val, -1, 1);
if($v > 0){
if($v == 1 && $countval > 1 && substr($val, -2, 1) > 0){
$tnstring .= $t2[0];
}else{
$tnstring .= $t1[$v];
}

}
}

$nstring[$i] .= $tnstring;
}

}
$rstring = "";
if(!empty($nstring[0]) || $zerobahtshow == 1 || empty($nstring[1])){
if($nstring[0] == "") $nstring[0] = $t1[0];
$rstring .= $nstring[0]."บาท";
}
if(count($number) == 1 || empty($nstring[1])){
$rstring .= "ถ้วน";
}else{
$rstring .= $nstring[1]."สตางค์";
}
return $rstring;
}

$rtdt = "SELECT tbdetail.nauto, tbdetail.nno, tbdetail.yy, tbdetail.mm, tbdetail.idno, tbmain.nname, tbmain.nposit, tbmain.nobank, tboffice.noffice, tbdetail.money1, tbdetail.money2, tbdetail.money3, tbdetail.money4, tbdetail.money5, tbdetail.money6, tbdetail.money7, tbdetail.money8, tbdetail.money9, tbdetail.money10,  tbdetail.sumget, tbdetail.exp1, tbdetail.exp2, tbdetail.exp3, tbdetail.exp4, tbdetail.exp5, tbdetail.exp6, tbdetail.exp7, tbdetail.exp8, tbdetail.exp9, tbdetail.exp10, tbdetail.sumpay, tbdetail.sumnet, tbdetail.money4txt, tbdetail.money5txt, tbdetail.money6txt, tbdetail.exp9txt, tbdetail.money10txt, tbdetail.daypay, tbdetail.remarks, tbbank.namebank, tbbank.sakhabank, tbmonth.nmonth FROM (((tbmain LEFT JOIN tbdetail ON tbmain.idno = tbdetail.idno) LEFT JOIN tbbank ON tbmain.cbank = tbbank.cbank) LEFT JOIN tboffice ON tbmain.noffice = tboffice.coff) LEFT JOIN tbmonth ON tbdetail.mm = tbmonth.mm WHERE ((tbdetail.nauto)=$vrec) ORDER BY tbdetail.mm DESC;";
//rtdt = retrive data, rsdt = resource data
$rsdt = mysql_query($rtdt); 
$nrows=mysql_num_rows($rsdt);
$rs=mysql_fetch_array($rsdt);
?>

<script language="javascript">
function printpr()
{
var OLECMDID = 7;
/* OLECMDID values:
* 6 - print
* 7 - print preview
* 1 - open window
* 4 - Save As
*/
var PROMPT = 1; // 2 DONTPROMPTUSER
var WebBrowser = '<OBJECT ID="WebBrowser1" WIDTH=0 HEIGHT=0 CLASSID="CLSID:8856F961-340A-11D0-A96B-00C04FD705A2"></OBJECT>';
document.body.insertAdjacentHTML('beforeEnd', WebBrowser);
WebBrowser1.ExecWB(OLECMDID, PROMPT);
WebBrowser1.outerHTML = "";
}
</script>

<SCRIPT type=text/javascript>   
function printDiv(divName) {   
     var printContents = document.getElementById(divName).innerHTML;   
     var originalContents = document.body.innerHTML;     
     document.body.innerHTML = printContents;   
     printpr();   
     document.body.innerHTML = originalContents;   
}   
</SCRIPT>  
<style>
.radi{
	border-radius:10px;
	
	background-color:rgba(255,255,255,0.8);
}
.radi2{
	background-color:rgba(255,255,255,255);
}

.bg{
	position:fixed; top:2%; left:0; width: 100%; height:100%;

}
</style>
<BODY background="images/bkgnd05.png">
<center><INPUT class="btn btn-success" onclick="window.open('viewmmpdfEmployee.php?vrec=<?php echo $vrec; ?>','_blank');"  value="พิมพ์ใบแจ้งเงินเดือน (PDF)" type=button>
 <font face = "ms sans serif" size = "3" color="#FF0000"><b>
 </b></font> <INPUT class="btn btn-info" onclick="window.location='allmonth.php';" value="กลับหน้าแรก" type=button> <font face = "ms sans serif" size = "3" color="#FF0000"><b>
     </b></font> <INPUT class="btn btn-danger" onclick="window.location='logout.php';" value="ออกจากระบบ" type=button></center><br>
<div id=divprint>
<center >
     <font  face = "ms sans serif" size = "3" color="#FF00FF">!!</font> 
     <font  class="radi" color="#0000FF">ขออภัยค่ะ..ขอให้ใช้ IE หรือ Chrome เพื่อพิมพ์ (Print) ออกกระดาษได้ครบถ้วนและสวยงามค่ะ</font> 
     <font face = "ms sans serif" size = "3" color="#FF00FF">!!</font>
</center>
<center><table cellspacing="0" cellpadding="0" width="90%" border="1"><tr><td>
<table class = "radi2" cellspacing="0" cellpadding="0" width="100%" border="0"  bgcolor="#FFFFFF">
<tr><td>&nbsp;</td></tr>
<tr><td align="center">
<table  cellspacing="0" cellpadding="0" width="90%" border="0">
<tr><td width="100" align="center"><img src="images/logoMOPH.png" border="0" width="80"></td>
<td align="left"><font face = "ms sans serif" size = "5"><b>โรงพยาบาลควนโดน<br>ใบรับรองการจ่ายเงินเดือนและเงินอื่น ๆ</b></font></td>
<td align="right">&nbsp;</td>
</tr>
</table><br>
<table cellspacing="0" cellpadding="0" width="90%" border="0">
<tr><td width="53%" colspan="3" align="left"><font face = "ms sans serif" size = "3">ประจำเดือน : <?php echo $rs['nmonth'], "&nbsp;ปี พ.ศ.", $rs['yy']; ?></font> </td>
<td width="4%">&nbsp;</td>
<td width="43%" colspan="3" align="left"><font face = "ms sans serif" size = "3">โอนเงินเข้าวันที่ : <?php echo $rs['daypay']; ?></font></td></tr>
<tr><td colspan="3" align="left"><font face = "ms sans serif" size = "3">ชื่อ-สกุล : <?php echo $rs['nname']; ?></font> </td>
<td >&nbsp;</td>
<td colspan="3" align="left"><font face = "ms sans serif" size = "3">ชื่อธนาคาร : </font><font face = "ms sans serif" size = "3"> <?php echo $rs['namebank'], "&nbsp;", $rs['sakhabank']; ?></font></td></tr>
<tr><td colspan="3" align="left"><font face = "ms sans serif" size = "3">หน่วยงาน : <?php echo $rs['noffice']; ?></font> </td>
<td>&nbsp;</td>
<td colspan="3" align="left"><font face = "ms sans serif" size = "3">เลขที่บัญชี : <?php echo $rs['nobank']; ?></font></td></tr>
<tr><td colspan="3" align="center"><font face = "ms sans serif" size = "3"><b><u>รายการรับ</u></b></font></td><td>&nbsp;</td>
<td colspan="3" align="center"><font face = "ms sans serif" size = "3"><b><u>รายการหัก</u></b></font></td></tr>
<tr><td width="40%"><font face = "ms sans serif" size = "3">1. เงินเดือน</font></td><td>&nbsp;</td>
<td  width="10%" align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['money1'],2); ?> บาท</font></td>
<td>&nbsp;</td>
<td width="30%"><font face = "ms sans serif" size = "3">1. ประกันสังคม</font></td><td>&nbsp;</td>
<td  width="10%" align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['exp1'],2); ?> บาท</font></td></tr>
<tr><td><font face = "ms sans serif" size = "3">2. เงินเดือน (ตกเบิก)</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['money2'],2); ?> บาท</font></td>
<td>&nbsp;</td>
<td><font face = "ms sans serif" size = "3">2. กองทุนสำรองเลี้ยงชีพ</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['exp2'],2); ?> บาท</font></td></tr>
<tr><td><font face = "ms sans serif" size = "3">3. เบี้ยเลี้ยง (กันดาร)</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['money3'],2); ?> บาท</font></td>
<td>&nbsp;</td>
<td><font face = "ms sans serif" size = "3">3. ภาษี</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['exp7'],2); ?> บาท</font></td></tr>
<tr valign="top"><td><font face = "ms sans serif" size = "3">4.  เงิน พตส.</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['money4'],2); ?> บาท</font></td>
<td>&nbsp;</td>
<td><font face = "ms sans serif" size = "3">4. สหกรณ์</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['exp3'],2); ?> บาท</font></td></tr>
<tr><td><font face = "ms sans serif" size = "3">5. ไม่ทำเวช</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['money5'],2); ?> บาท</font></td>
<td>&nbsp;</td>
<td><font face = "ms sans serif" size = "3">5.  ประกันสังคม (ตกเบิก)</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['exp4'],2); ?> บาท</font></td></tr>
<tr><td><font face = "ms sans serif" size = "3">6. ค่าล่วงเวลา</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['money6'],2); ?> บาท</font></td>
<td>&nbsp;</td>
<td><font face = "ms sans serif" size = "3">6.  อื่น ๆ</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['exp5'],2); ?> บาท</font></td></tr>
<td>&nbsp;</td>
<tr><td><font face = "ms sans serif" size = "3">รวมรับทั้งหมด</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['sumget'],2); ?> บาท</font></td>
<td>&nbsp;</td>
<td><font face = "ms sans serif" size = "3">รวมหักทั้งหมด</font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><?php echo number_format($rs['sumpay'],2); ?> บาท</font></td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td><font face = "ms sans serif" size = "3"><b>รับสุทธิ</b></font></td><td>&nbsp;</td>
<td align="right"><font face = "ms sans serif" size = "3"><b><?php echo number_format($rs['sumnet'],2); ?></b> บาท</font></td>
<td>&nbsp;</td>
<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td colspan="3" align="right"><font face = "ms sans serif" size = "3">(<?php echo num2thai($rs['sumnet']); ?>)</font></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>
<td colspan="3" align="center"><br>
<font face = "ms sans serif" size = "3">ลงชื่อ ................................................<br>
(นางสาวเยาวนา&nbsp;&nbsp;&nbsp;ยาพระจันทร์)<br>
นักวิชาการเงินและบัญชี<br>
กลุ่มบริหารงานทั่วไป<br></font>
<font color="#CCCCCC" size="-1">(วันที่ออกหนังสือรับรอง 
<?php 
echo date("d/m/Y เวลา h:i:s น.");
 ?>
)</font></td></tr>
</table>
</td></tr>
<tr><td align="left"><br><dd><font face = "ms sans serif" size = "3" color="#FF0000"><b>หมายเหตุ :</b>
<br><dd>1. กรุณาตรวจสอบข้อมูลหากไม่ถูกต้องโปรดทักท้วงทันที
<br><dd>2. เอกสารฉบับนี้เป็น "สำเนา" ต้องใช้ประกอบกับเอกสารที่ทางราชการออกให้เท่านั้น
<br><dd>3. หากต้องการฉบับจริงหรือพบข้อมูลไม่ถูกต้อง กรุณาติดต่องานการเงิน กลุ่มบริหารงานทั่วไป โรงพยาบาลควนโดน ตึกอำนวยการ ชั้น 2</font>
<br>
</td></tr>
</table>
<br><br></td></tr></table></center></div>
</BODY>
</HTML>
