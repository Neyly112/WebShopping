<script>
    function decreaseQuantity() {
        // Giảm giá trị của trường nhập số
        var input = this.parentNode.querySelector('input[type=number]');
        input.stepDown();

        // Tăng giá trị của biến soluong
        var soluongDisplay = document.getElementById('soluongDisplay');
        var soluongValue = parseInt(soluongDisplay.textContent);
        soluongValue++;
        soluongDisplay.textContent = soluongValue;
    }
</script>

<button onclick="decreaseQuantity()" class="minus">-</button>

<input class="quantity fw-bold text-black" min="0" name="quantity" value="1" type="number">

<span id="soluongDisplay">0</span> <!-- Hiển thị giá trị của biến soluong -->

