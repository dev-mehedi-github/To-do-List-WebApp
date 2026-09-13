<?php
require'../Controller/RegistrationValidation.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>To-Do | Registration</title>

        <script>

        </script>
        <style>

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