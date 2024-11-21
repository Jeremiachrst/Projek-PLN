<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="<?= base_url('public/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?= base_url('public/fontawesome/css/all.min.css'); ?>" rel="stylesheet">
    <style>
        <?php
        $css = file_get_contents(base_url('public/style/login.css'));
        $css = str_replace('{background-image-url}', base_url('public/images/pxfuel.jpg'), $css);
        echo $css;
        ?>
    </style>
</head>

<body>
    <div class="login-container">
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
        <?php endif; ?>
        <div>
            <h2>Welcome Back!</h2>
        </div>
        <div class="row align-items-center">
            <div class="col-md-6">
                <h5 class="text-left-md"><small>Please enter your details</small></h5>
                <form action="<?= base_url('public/dashboard') ?>" method="post" id="login-form">
                    <div class="form-group">
                        <label for="username"><i class="fas fa-user"></i> Username</label>
                        <input type="text" class="form-control rounded-input" id="username" name="username" required>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Please fill out this field</div>
                    </div>
                    <div class="form-group">
                        <label for="password"><i class="fas fa-lock"></i> Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control rounded-input" id="password" name="password" required>
                            <div class="input-group-append">
                                <span class="input-group-text show-password"><i class="fas fa-eye"></i></span>
                            </div>
                        </div>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Please fill out this field</div>
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input" id="rememberMe" name="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember Me</label>
                    </div>
                    <button type="submit" class="btn btn-login btn-block rounded-input">Login</button>
                </form>
                <?php if (session()->getFlashdata('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6">
                <img src="https://www.plnipservices.co.id/storage/config/open_graph.jpg" alt="Log Image" class="img-fluid custom-img">
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script>
        document.querySelector(".show-password").addEventListener("click", function() {
            const passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
                this.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordField.type = "password";
                this.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    </script>
    <script src="<?= base_url('public/js/script.js') ?>"></script>
</body>

</html>