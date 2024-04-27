<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <style>
        /* CSS để căn giữa và thiết lập kiểu dáng cho hộp thông báo */
        #error-box {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #f8d7da;
            color: #721c24;
            padding: 20px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        /* CSS cho nút OK */
        #ok-button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    display: block; /* Để nút OK trở thành một phần tử block */
    margin: 0 auto; /* Canh giữa theo chiều ngang */
}

    </style>
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
            header("Location:../../index.php");
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
            window.location.href ='./DangNhap.php';
        }
    </script>
</body>
</html>
