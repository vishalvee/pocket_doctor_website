<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css?v2">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <!-- <input type="password" placeholder="Password" name="password" id="password"> -->

                <div class="password-container" style="display:flex;">
                    <input type="password" placeholder="Password" id="password" name="password" required>
                    <i class="fa-solid fa-eye-slash" id="closed-eye" style="cursor:pointer;padding-top:0.6rem;"></i>
                    <i class="fa-solid fa-eye" id="open-eye" style="cursor:pointer;display:none;padding-top:0.6rem;"></i>
                </div>

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
        // function togglePasswordVisibility() {
        //     var passwordField = document.getElementById('password');
        //     var button = document.querySelector('.password-container button');

        //     if (passwordField.type === 'password') {
        //         passwordField.type = 'text';
        //         button.textContent = 'Hide';
        //     } else {
        //         passwordField.type = 'password';
        //         button.textContent = 'Show';
        //     }
        // }

        let eyeClosed=document.getElementById("closed-eye");
        let eyeOpen=document.getElementById("open-eye");
        let passwordBox=document.getElementById("password");
        eyeClosed.addEventListener("click",function(){
            eyeClosed.style.display="none";
            eyeOpen.style.display="block";
            passwordBox.type="text";
        });
        eyeOpen.addEventListener("click",function(){
            eyeOpen.style.display="none";
            eyeClosed.style.display="block";
            passwordBox.type="password";
        });
    </script>
</body>

</html>
