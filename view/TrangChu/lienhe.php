<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Liên hệ động nổi</title>
<style>
  #contactButtonFacebook {
    position: fixed;
    bottom: 90px;
    right: 20px;
    z-index: 9999;
    padding: 10px;
    width: 50px;
    height: 50px;
    background-color: transparent;
    color: #007bff;
    border: 2px solid #007bff;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: blink 1s infinite alternate;
  }

  #contactButtonFacebook::before {
    content: "";
    display: inline-block;
    width: 30px;
    height: 30px;
    background: url('https://img.icons8.com/color/48/000000/facebook-new.png') no-repeat;
    background-size: contain;
  }

  #contactButtonZalo {
    position: fixed;
    bottom: 20px;
    right: 20px;
    z-index: 9999;
    padding: 10px;
    width: 50px;
    height: 50px;
    background-color: transparent;
    color: #007bff;
    border: 2px solid #007bff;
    border-radius: 50%;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: blink 1s infinite alternate;
  }

  #contactButtonZalo::before {
    content: "";
    display: inline-block;
    width: 30px;
    height: 30px;
    background: url('https://img.icons8.com/color/48/zalo.png') no-repeat;
    background-size: contain;
  }

  @keyframes blink {
    0% {
      transform: scale(1);
    }
    100% {
      transform: scale(1.2);
    }
  }

  #contactForm {
    position: fixed;
    bottom: 70px;
    right: 20px;
    z-index: 9998;
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    display: none;
  }
</style>
</head>
<body>

<button id="contactButtonFacebook"></button>
<button id="contactButtonZalo"></button>

<div id="contactForm">
  <form>
    <input type="text" placeholder="Tên của bạn"><br>
    <input type="email" placeholder="Email của bạn"><br>
    <textarea placeholder="Nội dung"></textarea><br>
    <button type="submit">Gửi</button>
  </form>
</div>

<script>
  document.getElementById("contactButtonFacebook").addEventListener("click", function() {
    window.open("https://m.me/baotran53?hash=AbYwrnd48PUpeKNE", "_blank");
  });

  document.getElementById("contactButtonZalo").addEventListener("click", function() {
    window.open("https://zalo.me/0836982239", "_blank");
  });
</script>

</body>
</html>
