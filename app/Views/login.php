<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LOGIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('public/styles/login.css') ?>" />
    <link href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet" />
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap-icons/font/bootstrap-icons.css') ?>" />
</head>

<body>
    <!-- Main Container -->
    <div class="login-container">
        <!-- Header -->
        <div class="login-header">
            <i class="bi bi-people-fill"></i>
            <h3>LOGIN</h3>
        </div>

        <!-- Login Form -->
        <?= form_open('Login/auth'); ?>

            <!-- Error Message -->
            <?php if(session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <!-- Username and Password Fields -->
            <div class="mb-3">
                <?= form_label('Username', 'username', ['class' => 'form-label']) ?>
                <?= form_input('username', '', ['class' => 'form-control-input', 'id' => 'username']) ?>
            </div>
            <div class="mb-4">
                <?= form_label('Password', 'password', ['class' => 'form-label']) ?>
                <?= form_password('password', '', ['class' => 'form-control-input', 'id' => 'password']) ?>
            </div>

            <!-- Login Button -->
             <?= form_button([
                'type' => 'submit',
                'class' => 'login-btn',
                'content' => 'LOGIN',
             ]); ?>
        <?= form_close(); ?>
    </div>
</body>

</html>
