<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body>
    <div>
        <?php
            session_start();
            session_destroy();
            session_unset();


        ?>
        <h2  >Đăng xuất thành công </h2>
    </div>
    <div>
      
        <p>Trang này sẽ tự động quay lại trang đăng nhập sau <span id="countdown">05</span> giây.</p>
        <!-- Hiển thị bộ đếm thời gian -->
        <button onclick="returnToHomePage()">Quay lại trang đăng nhập</button>
        <!-- Nút để quay lại trang chủ ngay lập tức -->
    </div>

    <script>
        // Hàm để đếm ngược thời gian và chuyển hướng về trang chủ
        function returnToHomePage() {
            window.location.href = "../index.php"; // Chuyển hướng về trang chủ
        }

        // Bắt đầu bộ đếm thời gian
        var seconds = 5; // Thời gian đếm ngược (số giây)
        var countdownElement = document.getElementById('countdown');

        var countdownInterval = setInterval(function() {
            seconds--;
            countdownElement.textContent = seconds;

            if (seconds <= 0) {
                clearInterval(countdownInterval); // Dừng bộ đếm khi hết thời gian
                returnToHomePage(); // Chuyển hướng về trang chủ
            }
        }, 1000); // Cập nhật mỗi giây
    </script>
</body>

</html>