<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css?v2">
    <title>Admin Login Page</title>
</head>

<body>
    <div class="container">
        <div class="myform">
            <form method="post" onsubmit="return login()">
                <h2>Admin Login</h2>

                <div class="userlogo">
                    <img src="user.png" alt="user" width="20px">
                </div>
                <input type="text" placeholder="Admin Name" name="adminName" id="username">

                <div class="passwordlogo">
                    <img src="password.png" alt="password" width="20px">
                </div>
                <input type="password" placeholder="Password" name="password" id="password">
                <button type="submit" name="submit">Log In</button>
            </form>
        </div>
        <div class="show_hide">
                <button type="button" onclick="togglePasswordVisibility()">Show/Hide</button>
                 </div>

        <div class="image">
            <img src="blackdp2.png" alt="lff" width="300px">
        </div>
    </div>

   
    <script>
        function login() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // Check if username and password are correct
            if ((username === 'demo' && password === 'password') || (username === 'vishal' && password === 'pocket09')) {
                alert('Login successful ViSHAL!');
                
                // Redirect to a new page upon successful login
                window.location.href = 'http://localhost/adminpanelvee/admin_page.php';

                
                return false; // Prevent form submission
            } else {
                alert('Invalid username or password. Please try again.');
                return false; // Prevent form submission
            }
        }
        // HIDE/SHOW FUNCTIONALITY
        function togglePasswordVisibility() {
            var passwordField = document.getElementById('password');
            var button = document.querySelector('.password-container button');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                button.textContent = 'Hide';
            } else {
                passwordField.type = 'password';
                button.textContent = 'Show';
            }
        }

        
    </script>
</body>

</html>
