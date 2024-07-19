<?php
$hstname = "192.168.0.252";
$dtbase = "dbslip";
$usern = "ehos11402";
$passw = "ehos11402";
$connectdb = mysql_pconnect($hstname, $usern, $passw) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("SET NAMES utf8") or die('Invalid quer: ' . mysql_error());
?>
