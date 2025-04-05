<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmassist Login</title>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../resources/css/global.css">
    <link rel="stylesheet" href="../../resources/css/login.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <img src="../../public/image/FARMASSIST (2000 x 500 px).svg" alt="FarmAssist Logo" class="logo">
        <nav class="navbar">
            <a href="#">MENU</a>
            <a href="#">BRANCHES</a>
            <a href="#">DELIVERY</a>
            <a href="#">ABOUT US</a>
            <a href="#" class="icon-container">
                <i class="fa-solid fa-circle-user fa-2x"></i>
            </a>
            <a href="#"><i class="fa-solid fa-cart-shopping fa-2x"></i></a>
        </nav>
    </header>

    <!-- Spacer for fixed header -->
    <div class="header-spacer"></div>

    <!-- Content -->
    <div class="book-container">
        <div class="left">
            <img src="http://localhost/farmassist/public/image/farmassist-background.jpg" alt="Farmassist Image">
        </div>
        <div class="right">
            <h2>Login</h2>
            <p>Welcome back! Please login to your account</p>
            <form action="/login" method="POST">
                <label class="unpw" for="username">Username</label>
                <div class="input-group">
                    <input id="username" name="login_username" type="text" required>
                </div>
                <label class="unpw" for="password">Password</label>
                <div class="input-group">
                    <input id="password" name="login_password" type="password" required>
                </div>
                <button type="submit" class="login-btn">Login</button>
            </form>
            <div class="options">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password?</a>
            </div>
            <div class="signup">New User? <a href="#">Signup</a></div>
        </div>
    </div>

    <!-- JavaScript for header behavior -->
    <script src="http://localhost/farmassist/resources/js/header.js"></script>
</body>
</html>
