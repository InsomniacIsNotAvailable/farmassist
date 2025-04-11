<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="../../resources/css/aboutus.css">
    <link rel="stylesheet" href="../../resources/css/global.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../../resources/js/admin-users.js"></script> <!-- Include the new JS file -->
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
        <h1>Admin - Manage Users</h1>

        <!-- Display Users -->
        <h2>Users</h2>
        <table border="1" id="users-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Users will be dynamically loaded here -->
            </tbody>
        </table>

        <!-- Add New User -->
        <h2>Add New User</h2>
        <form id="add-user-form">
            <input type="text" name="username" placeholder="Username" required>
            <input type="text" name="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="text" name="contactno" placeholder="Contact Number" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="user_status" required>
                <option value="customer">Customer</option>
                <option value="admin">Admin</option>
            </select>
            <button type="submit">Add User</button>
        </form>
    </main>
</body>
</html>