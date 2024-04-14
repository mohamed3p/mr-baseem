<?php
// معلومات الاتصال بقاعدة البيانات
$servername = "localhost"; // اسم الخادم
$username = "root "; // اسم مستخدم قاعدة البيانات
$password = " root"; // كلمة مرور مستخدم قاعدة البيانات
$dbname = "TERBO  "; // اسم قاعدة البيانات

// إنشاء اتصال بقاعدة البيانات
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من اتصال قاعدة البيانات
if ($conn->connect_error) {
    die("فشل الاتصال: " . $conn->connect_error);
}

// استقبال البيانات من النموذج وتخزينها في متغيرات
$name = $_POST['name'];
$email = $_POST['email'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm-password'];

// التحقق من مطابقة كلمات المرور
if($password !== $confirm_password) {
    echo "كلمة المرور وتأكيدها غير متطابقين";
    exit();
}

// استعلام SQL لإدخال البيانات في الجدول
$sql = "INSERT INTO المستخدمين (name, email, address, phone, password) VALUES ('$name', '$email', '$address', '$phone', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "تم تسجيل الحساب بنجاح";
} else {
    echo "حدث خطأ أثناء التسجيل: " . $conn->error;
}

// إغلاق اتصال قاعدة البيانات
$conn->close();
?>
