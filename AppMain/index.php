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


$pdo = (new SQLiteConnection())->connect();

if ($pdo != null)
    echo 'Connected to the SQLite database successfully!';
else
    echo 'Whoops, could not connect to the SQLite database!';

echo "<hr>";

(new SQLiteCreateTable($pdo))->createTables();
$ar_table = (new SQLiteCreateTable($pdo))->getTableList();
print_r($ar_table);

 
$ins = new SQLiteInsert($pdo);
$ins->deleteAllNode();
$ins->insertNode(0,"System Security");
$ins->insertNode(0,"Access Control");
$ins->insertNode(0,"Application Security");

$parent_id = 1 ; 
$ins->insertNode($parent_id,"มีการควบคุมให้ช่องทางในการทําธุรกรรมมีความปลอดภัยโดยการใช้Protocol ที่เข้ารหัสลับในการรับส่งข้อมูลระหว่างผู้ใช้บริการ กับ Web Server เช่น HTTPs เป็นต้นโดยคํานึงถึงความปลอดภัยของช่องทางตั้งแต่จุดที่เริ่มปอนข้อมูล ไปจนถึงเครื่องแม่ข่าย ในระบบเครือข่ายภายในที่ทําการประมวลผล (End-to-EndEncryption)");
$ins->insertNode($parent_id,"มีการทํา End-to-End Encryption ที่ระดับ Application Layer เพื่อรักษาความลับและความปลอดภัยข้อมูลผู้ใช้บริการ เช่น รหัสผ่านของผู้ใช้บริการ,ข้อมูลบัญชีของผู้ใช้บริการ เป็นต้น");
$ins->insertNode($parent_id,"มีการรักษาความปลอดภัยของ Key ที่ใช้ในการเข้ารหัส/ถอดรหัส โดยการใช้ Hardware Security Module(HSM)");
$ins->insertNode($parent_id,"การพิสูจน์ตัวตน ควรทําที่เครื่องแม่ข่ายสําหรับการพิสูจน์ตัวตนโดยเฉพาะซึ่งถูกแยกทางกายภาพ (Physical)กับ Database Server ที่ใช้ในการให้บริการ Internet Banking");
$ins->insertNode($parent_id," มีการเข้ารหัสข้อมูลรหัสผ่านของผู้ใช้บริการ ที่จัดเก็บในฐานข้อมูลที่ใช้ในการพิสูจน์ตัวตน (Authentication Database) ด้วยมาตรฐานการเข้ารหัสที่เป็นที่ยอมรับสากล โดยเลือกใช้อัลกอริทึมในการเข้ารหัสลับแบบย้อนกลับไม่ได้(Irreversible Encryption หรือ Hashing) และมีความมั่นคงปลอดภัย ยกตัวอย่างเช่น SHA256 แบบมี Salt เป็นอย่างน้อย");
$ins->insertNode($parent_id,"  ในขั้นตอนการออกแบบและพัฒนา Web Application ควรคํานึงถึงความปลอดภัยของระบบงานให้ครอบคลุมความเสี่ยงของ OWASP14 TOP 10 ปล่าสุด");

$ins->insertNode($parent_id," มีการทดสอบเจาะระบบงาน (Application Penetration Test) โดยผู้เชี่ยวชาญ อย่างน้อยปละครั้ง และ/หรือ ทุกครั้งที่มีการเปลี่ยนแปลงค่าความปลอดภัย หรือมีการเปลี่ยนแปลงความเสี่ยงทางเทคโนโลยีที่มีนัยสําคัญ รวมทั้งควรจะมีการพิจารณาเปลี่ยนผู้เชี่ยวชาญที่ทําการทดสอบตามความเหมาะสม โดยการทดสอบต้องครอบคลุม - ฟงก์ชั่นการทํางานของโปรแกรมทั้งหมด (Business Logic) - OWASP top 10 ของปล่าสุด");
$ins->insertNode($parent_id," มีการทบทวนรหัสต้นฉบับเพื่อตรวจหาช่องโหว่ (Security Source Code Review) ทุกครั้งที่มีการเปลี่ยนแปลงระบบงานที่มีนัยสําคัญเพื่อลดความเสี่ยงที่อาจเกิดขึ้นจากการพัฒนาแอพพลิเคชั่นอย่างไม่ปลอดภัย");
$ins->insertNode($parent_id,"มีการประเมินความเสี่ยงและช่องโหว่ของ Internet Banking Application อย่างสม่ําเสมอ หรือเมื่อมีภัย ใหม่ๆ และมีการปรับปรุงแก้ไข Application หรือเพิ่มการควบคุมที่จําเป็นอย่างทันท่วงที");


