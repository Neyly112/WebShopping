<!DOCTYPE html>
<html>

<head>
    <title>Đổi mật khẩu</title>
    <link rel="stylesheet" type="text/css" href="./style.css">
</head>

<body>
    <?php
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password_new = $_POST["mkm"];

        include '../../model/pdo.php';

        $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = pdo_query_one($sql);

        if ($result != null) {
            //thực hiện đổi mật khẩu 
            $sql = "UPDATE user SET email='$email', password='$password_new' WHERE email='$email'";

            pdo_executer($sql);
            $thongbao = "Đổi mật khẩu thành công";
            echo $thongbao;

            // Hiển thị hộp thoại thông báo thành công và chuyển hướng khi nhấn OK
            echo "<script>
                var thongbao = '$thongbao';
                alert(thongbao);
                window.location.href ='../../admin/index.php?act=dmk';
              </script>";
        } else {
            $error_message = "Mật khẩu sai, vui lòng thử lại.";
        }
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
            window.location.href = '../../admin/index.php?act=dmk';
        }
    </script>
</body>

</html>