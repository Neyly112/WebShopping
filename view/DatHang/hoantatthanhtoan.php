<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hoàn tất đặt hàng</title>
</head>

<body>
    <div>
        <h2>Đặt hàng thành công!</h2>
        <p>Cảm ơn bạn đã mua hàng của chúng tôi. Mã đơn hàng của bạn là: <?php echo $_GET['MaDonHang']; ?></p>
        <!-- Hiển thị thông báo thành công và mã đơn hàng -->
    </div>
    <div>
        <p>Trang này sẽ tự động quay lại trang chủ sau <span id="countdown">10</span> giây.</p>
        <!-- Hiển thị bộ đếm thời gian -->
        <button onclick="returnToHomePage()">Quay lại trang chủ</button>
        <!-- Nút để quay lại trang chủ ngay lập tức -->
    </div>

    <script>
        // Hàm để đếm ngược thời gian và chuyển hướng về trang chủ
        function returnToHomePage() {
            window.location.href = '../../index.php'; // Chuyển hướng về trang chủ
        }

        // Bắt đầu bộ đếm thời gian
        var seconds = 10; // Thời gian đếm ngược (số giây)
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