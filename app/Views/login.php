<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('public/styles/login.css') ?>">
    <link href="<?= base_url('node_modules/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('node_modules/bootstrap-icons/font/bootstrap-icons.css') ?>">
</head>

<body>
    <div class="login-container">
        <div class="login-header">
            <i class="bi bi-people-fill"></i>
            <h3>LOGIN</h3>
        </div>
        <form action="login_process.php" method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" name="username" class="form-control-input" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control-input" required>
            </div>
            <button type="submit" class="login-btn">LOGIN</button>
        </form>
    </div>
</body>

</html>