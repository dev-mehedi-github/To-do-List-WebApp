<?php
require '../Controller/RegistrationValidation.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>To-Do | Registration</title>

    <script>
        function collect_data() {
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

        h1 {
            text-align: center;
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

        nput[type="submit"] {
            background-color: #4CAF50;
            color: white;
        }

        input[type="reset"] {
            background-color: #f44336;
            color: white;
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
    </style>
</head>

<body>
    <h1>Complete your registration</h1>
    <form method="post" action="" onsubmit="return collect_data()">
        <fieldset>
            <legend>Login Information</legend>
            <table>
                <tr>
                    <td><label for="username"> User Name: </label></td>
                    <td>
                        <input type="text" id="name" name="name">
                        <?php echo htmlspecialchars($name ?? ''); ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="pass"> Password: </label></td>
                    <td>
                        <input type="password" id="password" name="password">
                        <?php echo htmlspecialchars($password ?? ''); ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" id="submit" value="Register">
                        <input type="reset" id="reset">
                    </td>
                </tr>
            </table>
            <p><?php echo htmlspecialchars($message ?? ''); ?></p>
            <p>Already have an account? <a href="login.php">Login here</a></p>
        </fieldset>
    </form>
</body>

</html>