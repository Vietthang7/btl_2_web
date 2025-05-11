<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "123456";
$database = "bt2_web";


$conn = new mysqli($servername, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$dob = $_POST['dob'];

// Lưu dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO users (fullname, email, phone, address, dob) VALUES ('$fullname', '$email', '$phone', '$address', '$dob')";
if ($conn->query($sql) === TRUE) {
    echo "Đăng ký thành công! <a href='view.php'>Xem danh sách</a>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>