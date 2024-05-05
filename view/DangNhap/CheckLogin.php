<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
    if(isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $conn = mysqli_connect('localhost', 'root', '', 'qlbh');
        if(!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) == 1) {
            echo ('thanh cong');
            header("Location:../../admin/index.php");
            exit();
        } else {
            $error_message = "Email hoặc mật khẩu không đúng, vui lòng thử lại.";
        }

        mysqli_close($conn);
    }
    ?>

    <!-- Phần tử div cho hộp thông báo -->
    <div id="error-box">
        <p id="error-message"><?php echo isset($error_message) ? $error_message : ""; ?></p>
        <button id="ok-button" onclick="hideError()">OK</button>
    </div>

    <script>
        // JavaScript để hiển thị hộp thông báo khi cần thiết
        window.onload = function() {
            var errorMessage = "<?php echo isset($error_message) ? $error_message : ""; ?>";
            if (errorMessage !== "") {
                displayError();
            }
        };

        // Hàm để hiển thị hộp thông báo
        function displayError() {
            var errorBox = document.getElementById('error-box');
            errorBox.style.display = 'block'; // Hiển thị hộp thông báo
        }

        // Hàm để ẩn hộp thông báo khi nhấn nút OK
        function hideError() {
            var errorBox = document.getElementById('error-box');
            errorBox.style.display = 'none'; // Ẩn hộp thông báo
            window.location.href ='../../index.php?act=dangnhap';
        }
    </script>
</body>
</html>
