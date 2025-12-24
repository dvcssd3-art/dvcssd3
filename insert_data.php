<?php
// ข้อมูลเชื่อมต่อฐานข้อมูล
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feedback_system";

// เชื่อมต่อ MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ: " . $conn->connect_error);
}

// รับค่าจากฟอร์ม
$name     = $_POST['name'];
$type     = $_POST['type'];
$detail   = $_POST['detail'];

 //เตรียมคำสั่ง SQL แบบปลอดภัย
$stmt = $conn->prepare(
    "INSERT INTO feedback (name, type ,detail) VALUES (?, ?, ?)"
);

// ผูกค่าตัวแปรกับ SQL
$stmt->bind_param("sss", $name, $type, $detail);

//สั่งรันคำสั่ง
if ($stmt->execute()) {
    echo "บันทึกข้อมูลเรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาด: " . $stmt->error;
}

 //ปิดการทำงาน
$stmt->close();
$conn->close();
?>

