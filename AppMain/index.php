<?php 
namespace AppMain;



include("..\\App\\Config.php");
include("..\\App\\SQLiteConnection.php");
include("..\\App\\SQLiteCreateTable.php");
include("..\\App\\SQLiteInsert.php");

// // use App\SQLiteConnection;
use App\Config;
use App\SQLiteConnection;
use App\SQLiteCreateTable;
use App\SQLiteInsert;

echo "<h1> Setup Database / Create Data  </h1>";

echo Config::pathToSQLiteFile(".") ; 

$pdo = (new SQLiteConnection())->connect("..");

echo "<br>";
if ($pdo != null)
    echo 'Connected to the SQLite database successfully!';
else
    echo 'Whoops, could not connect to the SQLite database!';

echo "<hr>";

(new SQLiteCreateTable($pdo))->createTables();
$ar_table = (new SQLiteCreateTable($pdo))->getTableList();
// print_r($ar_table);

 
$ins = new SQLiteInsert($pdo);
$ins->deleteAllNode();
$id =  $ins->insertNode(0,"System Security");
echo "<br>inserted $id";
$id =  $ins->insertNode(0,"Access Control");
echo "<br>inserted $id";
$id = $ins->insertNode(0,"Application Security");
echo "<br>inserted $id";

$parent_id = 1  ; 
$ins->insertNode($parent_id,"มีการควบคุมให้ช่องทางในการทําธุรกรรมมีความปลอดภัยโดยการใช้Protocol ที่เข้ารหัสลับในการรับส่งข้อมูลระหว่างผู้ใช้บริการ กับ Web Server เช่น HTTPs เป็นต้นโดยคํานึงถึงความปลอดภัยของช่องทางตั้งแต่จุดที่เริ่มปอนข้อมูล ไปจนถึงเครื่องแม่ข่าย ในระบบเครือข่ายภายในที่ทําการประมวลผล (End-to-EndEncryption)");
$ins->insertNode($parent_id,"มีการทํา End-to-End Encryption ที่ระดับ Application Layer เพื่อรักษาความลับและความปลอดภัยข้อมูลผู้ใช้บริการ เช่น รหัสผ่านของผู้ใช้บริการ,ข้อมูลบัญชีของผู้ใช้บริการ เป็นต้น");
$ins->insertNode($parent_id,"มีการรักษาความปลอดภัยของ Key ที่ใช้ในการเข้ารหัส/ถอดรหัส โดยการใช้ Hardware Security Module(HSM)");
$ins->insertNode($parent_id,"การพิสูจน์ตัวตน ควรทําที่เครื่องแม่ข่ายสําหรับการพิสูจน์ตัวตนโดยเฉพาะซึ่งถูกแยกทางกายภาพ (Physical)กับ Database Server ที่ใช้ในการให้บริการ Internet Banking");
$ins->insertNode($parent_id," มีการเข้ารหัสข้อมูลรหัสผ่านของผู้ใช้บริการ ที่จัดเก็บในฐานข้อมูลที่ใช้ในการพิสูจน์ตัวตน (Authentication Database) ด้วยมาตรฐานการเข้ารหัสที่เป็นที่ยอมรับสากล โดยเลือกใช้อัลกอริทึมในการเข้ารหัสลับแบบย้อนกลับไม่ได้(Irreversible Encryption หรือ Hashing) และมีความมั่นคงปลอดภัย ยกตัวอย่างเช่น SHA256 แบบมี Salt เป็นอย่างน้อย");
$ins->insertNode($parent_id,"  ในขั้นตอนการออกแบบและพัฒนา Web Application ควรคํานึงถึงความปลอดภัยของระบบงานให้ครอบคลุมความเสี่ยงของ OWASP14 TOP 10 ปล่าสุด");
$ins->insertNode($parent_id," มีการทดสอบเจาะระบบงาน (Application Penetration Test) โดยผู้เชี่ยวชาญ อย่างน้อยปละครั้ง และ/หรือ ทุกครั้งที่มีการเปลี่ยนแปลงค่าความปลอดภัย หรือมีการเปลี่ยนแปลงความเสี่ยงทางเทคโนโลยีที่มีนัยสําคัญ รวมทั้งควรจะมีการพิจารณาเปลี่ยนผู้เชี่ยวชาญที่ทําการทดสอบตามความเหมาะสม โดยการทดสอบต้องครอบคลุม - ฟงก์ชั่นการทํางานของโปรแกรมทั้งหมด (Business Logic) - OWASP top 10 ของปล่าสุด");
$ins->insertNode($parent_id," มีการทบทวนรหัสต้นฉบับเพื่อตรวจหาช่องโหว่ (Security Source Code Review) ทุกครั้งที่มีการเปลี่ยนแปลงระบบงานที่มีนัยสําคัญเพื่อลดความเสี่ยงที่อาจเกิดขึ้นจากการพัฒนาแอพพลิเคชั่นอย่างไม่ปลอดภัย");
$ins->insertNode($parent_id,"มีการประเมินความเสี่ยงและช่องโหว่ของ Internet Banking Application อย่างสม่ําเสมอ หรือเมื่อมีภัย ใหม่ๆ และมีการปรับปรุงแก้ไข Application หรือเพิ่มการควบคุมที่จําเป็นอย่างทันท่วงที");

$parent_id = 2  ; 
$ins->insertNode($parent_id,"- มีการระบุตัวตนและพิสูจน์ตัวตนของผู้ใช้บริการ โดยการใช้ Two-Factor Authentication ในขั้นตอนการเข้าใช้ระบบงานและควบคุมไม่ให้ User ID เดียวกันเข้าใช้งานระบบพร้อมกัน (Concurrent Session)");
$ins->insertNode($parent_id,"มีการควบคุมให้ระบบล็อกบัญชีผู้ใช้ของผู้ใช้บริการเมื่อมีการใส่ข้อมูลการพิสูจน์ตัวตน ผิดเกินจํานวน 3-5 ครั้งโดยระบบต้องไม่เปดเผยข้อความแจ้งเตือนที่เป็นการบ่งชี้ว่าข้อมูลพิสูจน์ตัวตนส่วนใดที่ไม่ถูกต้อง");
$ins->insertNode($parent_id,"กําหนดให้ผู้ใช้บริการตั้งค่ารหัสผ่านให้มีความซับซ้อนและยากต่อการคาดเดา โดยรหัสผ่านต้องประกอบไปด้วยตัวอักษร ตัวอักขระพิเศษและตัวเลข");
$ins->insertNode($parent_id,"ีการบังคับให้ผู้ใช้บริการเปลี่ยนรหัสผ่านเมื่อเข้าใช้ระบบงานครั้งแรก หรือได้รับรหัสผ่านใหม่");
$ins->insertNode($parent_id,"หากผู้ใช้บริการลืมรหัสผู้ใช้งาน หรือรหัสผ่านต้องมีการพิสูจน์ตัวตนของลูกค้าโดยวิธี Two-Factor Authenticationก่อนให้ลูกค้าทําการ Reset รหัสผ่าน");
$ins->insertNode($parent_id,"หากมีการป้อนรหัสผิดต้องมีการบันทึกข้อมูล IP ผู้ป้อนรหัสผิดพร้อมทั้งชื่อบัญชีที่ระบุด้วย ");
$ins->insertNode($parent_id,"หากผู้ป้อนรหัสถูกต้องต้องระบุบัญชีที่ป้อนถูกต้องพร้อมทั้ง IP ด้วย ");
$ins->insertNode($parent_id,"การล้อกออน อาจเก็บประวัติ Browser ว่าเป้นรุ่นใดด้วยเพื่อใช้ในการตรวจสอบ กลุ่มผู้ใช้");

$parent_id = 3 ; 
$ins->insertNode($parent_id,"ีการแสดงวันที่ และเวลาที่เข้าระบบครั้งล่าสุดเมื่อเข้าสู่ระบบ Internet Banking สําเร็จ เพื่อให้ลูกค้าได้ตรวจสอบความถูกต้องของเวลาที่มีกิจกรรมครั้งล่าสุด");
$ins->insertNode($parent_id,"มีการบริหารจัดการ Session การใช้งานอย่างเหมาะสม โดยอย่างน้อยให้มีการควบคุมที่ลดความเสี่ยงจากMan-in-the-Middle Attack และ Man-in-the-Browser Attack");
$ins->insertNode($parent_id," มีการกําหนด Time-Out ของ Session ให้ไม่เกิน 10 นาที");
$ins->insertNode($parent_id,"มีการเก็บ ล็อก กรณีมีการเปลี่ยนช้อมูลโปรไฟล์ผู้ใช้ เช่น เปลี่ยนที่อยู่ เบอร์โทร E-mail เป็นต้น");
