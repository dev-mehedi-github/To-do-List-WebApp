<?php
require "../Controller/LoginValidation.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <script>
        function collect_data()
        {
            let name = document.getElementById("name").value.trim();
            let password = document.getElementById("password").value.trim();
            let valid = true;
            let message = "";
            if (name.length < 5) {
                message += "User Name Should be 5 Char\n";
                valid = false;
            }
            if (password.length < 5) {
                message += "Password Must be 5 Char";
                valid = false;
            }
            if (!valid) {
                alert(message);
            }
            return valid;
        }
    </script>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

form {
    background: #fff;
    padding: 30px 40px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 400px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

td {
    padding: 10px 0;
}

label {
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
}

input[type="text"]:focus,
input[type="password"]:focus {
    outline: none;
    border-color: #4CAF50;
}

input[type="submit"],
input[type="reset"] {
    padding: 10px 20px;
    margin-right: 10px;
    margin-top: 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

input[type="reset"] {
    background-color: #f44336;
    color: white;
}

input[type="reset"]:hover {
    background-color: #da190b;
}

p {
    text-align: center;
    margin-top: 15px;
    color: #555;
}

a {
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}
    </style>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="" onsubmit="return collect_data()">
        <table>
            <tr>
                <td><label for="username"> User Name: </label></td>
                <td><input type="text" id="name" name="name">
                    <?php echo $name ?>
                </td>
            </tr>
            <tr>
                <td><label for="pass"> Password: </label></td>
                <td><input type="password" id="password" name="password">
                    <?php echo $password ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" id="submit" value="Login">
                    <input type="reset" id="reset">
                </td>
            </tr>
        </table>
        <p><?php echo $message; ?></p>
        <p>Don't have an account? <a href="Registration.php">Register here</a></p>
    </form>
</body>
</html>