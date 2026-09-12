<?php
include "../Controller/RegistrationValidation.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
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

        
    </style>
</head>
<body>
    <h2>Registration</h2>
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
                    <input type="submit" id="submit" value="Register">
                    <input type="reset" id="reset">
                </td>
            </tr>
        </table>
        <p><?php echo $message; ?></p>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </form>
</body>
</html>