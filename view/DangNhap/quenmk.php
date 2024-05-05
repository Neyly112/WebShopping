
<!-- Login 4 - Bootstrap Brain Component -->

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="card border-light-subtle shadow-sm">
            <div class="row g-0">
                <div class="col-12 col-md-6">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-5 fw-bold">
                                    <h3>LẤY LẠI MẬT KHẨU</h3>
                                </div>
                            </div>
                        </div>
                        <form action="./view/DangNhap/guiemail.php" method="POST">
                            <div class="row gy-3 gy-md-4 overflow-hidden">
                                <div class="col-12">
                                    <label for="email" class="form-label fw-bold">Vui lòng nhập email
                                        <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="ten@gmail.com" required>
                                </div>
                                <div class="col-12">
                                    <div class="d-grid">
                                        <button class="btn bsb-btn-xl btn-primary" type="submit">Lấy lại mật khẩu</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
