<?php
include "connect.php";

$name_surname = $_POST['name_surname'];
$lvevl        = $_POST['lvevl'];
$branch       = $_POST['branch'];
$idea         = $_POST['idea'];

$sql = "INSERT INTO a (name_surname, lvevl, branch, idea)
        VALUES ('$name_surname', '$lvevl', '$branch', '$idea')";

if ($conn->query($sql) === TRUE) {
    echo "บันทึกข้อมูลเรียบร้อย";
    echo "<br><a href='form.php'>กลับหน้าแบบฟอร์ม</a>";
} else {
    echo "เกิดข้อผิดพลาด: " . $conn->error;
}

$conn->close();
?>
