<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../resources/css/signup.css">
    <link rel="stylesheet" href="../../resources/css/global.css">
    
</head>
<body>
    <div class="header-spacer"></div>
    <script src="http://localhost/farmassist/resources/js/header.js"></script>
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
    <main>
        <div class="book-container">
            <div class="left">
                <img src="http://localhost/farmassist/public/image/farmassist-background.jpg" alt="Farmassist Image">
            </div>
            <div class="right">
                <h2>Create Account</h2>
                <p>Join us today and enjoy exclusive benefits, faster checkout, and personalized recommendations. Creating an account is quick and easy!</p>
                
                <script src="http://localhost/farmassist/resources/js/multi-step-form.js"></script>
                <form action="http://localhost/farmassist/database/database.php" method="POST" class="multi-step-form">
                    <!-- Step 1: Personal Info -->
                    <fieldset class="form-step active">
                        <legend>Personal Information</legend>
                        <label for="signup_username">Username</label>
                        <input id="signup_username" name="signup_username" type="text" required>
                        <label for="signup_firstname">First Name</label>
                        <input id="signup_firstname" name="signup_firstname" type="text" required>
                        <label for="signup_lastname">Last Name</label>
                        <input id="signup_lastname" name="signup_lastname" type="text" required>
                        <div class="button-group">
                            <button type="button" class="next-btn">Next</button>
                        </div>
                    </fieldset>

                    <!-- Step 2: Contact Info -->
                    <fieldset class="form-step">
                        <legend>Contact Information</legend>
                        <label for="signup_email">Email</label>
                        <input id="signup_email" name="signup_email" type="email" required>
                        <label for="signup_contactno">Contact Number</label>
                        <input id="signup_contactno" name="signup_contactno" type="text" required>
                        <div class="button-group">
                            <button type="button" class="prev-btn">Previous</button>
                            <button type="button" class="next-btn">Next</button>
                        </div>
                    </fieldset>

                    <!-- Step 3: Password -->
                    <fieldset class="form-step">
                        <legend>Set Your Password</legend>
                        <label for="signup_rawpassword">Password</label>
                        <input id="signup_rawpassword" name="signup_rawpassword" type="password" required>

                        <label for="signup_confirmpassword">Confirm Password</label>
                        <input id="signup_confirmpassword" name="signup_confirmpassword" type="password" required>
                        
                        <div class="prev-button-container">
                            <button type="button" class="prev-btn">Previous</button>
                        </div>
                        <div class="submit-button-container">
                            <input type="submit" value="Create Account" class="submit-btn">
                        </div>
                    </fieldset>
                </form>
                <div class="signup">
                    <p>Have an account? <a href="/login">Log in</a></p>
                </div>
            </div>
        </div>
    </main>
</body>
</html>