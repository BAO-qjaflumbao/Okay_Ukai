<?php
include("php/config.php");
session_start();

// Redirect if session doesn't exist
if (!isset($_SESSION['reset_user'])) {
    header("Location: forgot_password.php");
    exit();
}

$errors = [];

if (isset($_POST['reset'])) {
    $new_password = mysqli_real_escape_string($con, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
    $username = $_SESSION['reset_user'];

    // Validation
    if ($new_password !== $confirm_password) {
        $errors[] = "• Passwords do not match.";
    }

    if (strlen($new_password) < 8) {
        $errors[] = "• Password must be at least 8 characters long.";
    }

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])/', $new_password)) {
        $errors[] = "• Password must include an uppercase letter, a lowercase letter, a number, and a special character.";
    }

    // If no errors, update password
    if (empty($errors)) {
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        $query = "UPDATE users SET password=? WHERE username=?";
        $stmt = $con->prepare($query);
        $stmt->bind_param("ss", $hashed_password, $username);

        if ($stmt->execute()) {
            session_destroy();
            header("Location: logreg.php");
            exit();
        } else {
            $errors[] = "Failed to update password. Please try again.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/reset.css">
    <title>Reset Password</title>
</head>

<body>
    <div class="container">
        <div class="form-container sign-in">
            <form method="post">
                <h1>Reset Password</h1>
                <div class="password-container">
                    <input type="password" name="new_password" id="new_password" placeholder="New Password" required />
                    <button type="button" class="toggle-password"
                        onclick="togglePassword('new_password', this)">🙈</button>
                </div>

                <div class="password-container">
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"
                        required />
                    <button type="button" class="toggle-password"
                        onclick="togglePassword('confirm_password', this)">🙈</button>
                </div>

                <!-- Display errors -->
                <?php
                if (!empty($errors)) {
                    foreach ($errors as $err) {
                        echo "<p style='color:red;'>$err</p>";
                    }
                }
                ?>

                <button type="submit" name="reset">Reset Password</button>

                <div class="links">
                    Already a member? <a href="logreg.php">Sign In</a>
                </div>
            </form>
        </div>
    </div>
    <script> //peek password button script🙈🙉
        function togglePassword(inputId, button) {
            const input = document.getElementById(inputId);
            if (input.type === "password") {
                input.type = "text";
                button.textContent = "🙉";
            } else {
                input.type = "password";
                button.textContent = "🙈";
            }
        }
    </script>
</body>

</html>