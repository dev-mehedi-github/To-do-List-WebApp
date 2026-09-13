<?php
include "../Controller/RegistrationValidatio.php"
?>

<!DOCTYPE html>
<html>

<head>
    <title>TO-DO | Registration</title>
    <link rel="stylesheet" href="../design/style.css">
    <script>
        function collect_data() {
            let name = document.getElementById("name").value.trim();
            let pass = document.getElementById("pass").value.trim();
            let con_pass = document.getElementById("con_pass").value.trim();
            let valid = true;
            let message = "";

            if (name.length < 5) {
                message += "User Name Should be 5 Char\n";
                valid = false;
            }

            if (pass.length < 5) {
                message += "Password Must be at least 5 characters\n";
                valid = false;
            }

            if(pass != con_pass){
                message += "Password not matched\n";
                valid = false;
            }
            if (!valid) {
                alert(message);
            }
            return valid;

        }
    </script>

</head>

<body>
    <div class="container">
    <h1>Complete Registration for save your Sessions</h1>
    <form action="" method="post" onsubmit="return collect_data()">
        <fieldset>
            <legend>LogIn Information</legend>
            <table>
                <tr>
                    <td><label for="username"> Username: </label></td>
                    <td>
                        <input type="text" id="name" name="name" placeholder="e.g. John Dev">
                        <?php echo htmlspecialchars($name ?? ''); ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="pass"> Password: </label></td>
                    <td>
                        <input type="password" id="pass" name="pass" placeholder="*****">
                        <?php echo htmlspecialchars($password ?? ''); ?>
                    </td>
                </tr>

                <tr>
                    <td><label for="pass"> Confirm Password: </label></td>
                    <td>
                        <input type="password" id="con_pass" name="con_pass" placeholder="*****">
                        <?php echo htmlspecialchars($con_password ?? ''); ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" id="submit" value="Register">
                        <input type="reset" id="reset">
                    </td>
                </tr>
            </table>
        </fieldset>
    </form>
    </div>
</body>

</html>