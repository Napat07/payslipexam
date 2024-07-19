<?php 
@mysql_connect("Host", "user", "password") or die("เชื่อมต่อไม่สำเร็จ มีข้อมูลผิด");  //ใส่ข้อมูล host user password ของฐานข้อมูล
@mysql_select_db("database") or die("เลือกฐานข้อมูลไม่ได้");                     //ใส่ข้อมูล database ที่ต้องการ (dbslip)
mysql_query("SET NAMES utf8") or die('Invalid quer: ' . mysql_error());
?> 
