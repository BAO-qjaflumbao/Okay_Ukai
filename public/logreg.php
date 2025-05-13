<?php
include("php/config.php");
session_start();


//LOGIN
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = $_POST['password']; // Don't escape passwords unnecessarily

    // 🔐 User login
    $stmt = $con->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        if (password_verify($password, $row['password'])) {
            $_SESSION['valid'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['contact'] = $row['contact'];
            $_SESSION['id'] = $row['user_id'];
            header("Location:/Okay_Ukai/public/index.php");
            exit();
        }
    }

    // 🔐 Admin login
    $stmt = $con->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $admin_result = $stmt->get_result();

    if ($admin = $admin_result->fetch_assoc()) {
        if (password_verify($password, $admin['password_hash'])) {
            $_SESSION['admin'] = $admin['username'];
            $_SESSION['admin_id'] = $admin['id'];
            header("Location: /Okay_Ukai/public/adminindex.php");
            exit();
        }
    }

    echo "<div class='message'><p>Wrong Username or Password</p></div><br>";
    echo "<a href='login.php'><button class='btn'>Go Back</button>";
}



// REGISTER
$errors = [];

if (isset($_POST['register'])) {
    $name = trim($_POST['name']);
    $username = trim($_POST['username']);
    $contact = trim($_POST['contact']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $pet_name = trim($_POST['pet_name']);

    // Name validation
    if (!preg_match("/^[a-zA-Z\s'-]+$/", $name)) {
        $errors[] = "• Invalid name. Use letters, spaces, apostrophes, or hyphens only.";
    }

    // Username validation
    if (!preg_match("/^[a-zA-Z0-9]+$/", $username)) {
        $errors[] = "• Invalid username. Use letters and numbers only, no spaces or special characters.";
    }

    // Unique username check
    $check = $con->prepare("SELECT username FROM users WHERE username = ?");
    $check->bind_param("s", $username);
    $check->execute();
    $result = $check->get_result();
    if ($result->num_rows > 0) {
        $errors[] = "• Username is already taken. Please try another.";
    }

    // Contact number validation (Philippines)
    if (!preg_match('/^(\+63|0)9\d{9}$/', $contact)) {
        $errors[] = "• Invalid contact number. Must be a valid Philippine number.";
    }

    // Password validations
    if ($password !== $confirm_password) {
        $errors[] = "• Passwords do not match.";
    }

    if (strlen($password) < 8) {
        $errors[] = "• Password must be at least 8 characters long.";
    }

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])/', $password)) {
        $errors[] = "• Password must include an uppercase letter, a lowercase letter, a number, and a special character.";
    }

    // If no errors, register user
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $con->prepare("INSERT INTO users (name, username, contact, password, security_answer) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $username, $contact, $hashed_password, $pet_name);

        if ($stmt->execute()) {
            echo "<div class='message'><p>Registration successful!</p></div><br>";
            echo "<a href='login.php'><button class='btn'>Login Now</button></a>";
            exit();
        } else {
            $errors[] = "Registration failed. Please try again.";
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $err) {
            echo "<p style='color:red;'>$err</p>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="logreg.css" />
  <title>Modern Login Page</title>
</head>

<body>
  <div class="container" id="container">
    <!-- Register Form -->
    <div class="form-container sign-up">
      <form action="" method="post">
        <h1>Create Account</h1>
        <input type="text" name="name" placeholder="Name" required />
        <input type="text" name="username" placeholder="Username" required />
        <input type="number" name="contact" placeholder="Contact" required />

        <div class="password-container">
          <input type="password" name="password" id="reg_password" placeholder="Password" required />
          <button type="button" class="toggle-password" onclick="togglePassword('reg_password', this)">🙈</button>
        </div>

        <div class="password-container">
          <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required />
          <button type="button" class="toggle-password" onclick="togglePassword('confirm_password', this)">🙈</button>
        </div>

        <input type="text" name="pet_name" placeholder="What is your pet's name?" required />
        <button type="submit" name="register">Register</button>
      </form>
    </div>

    <!-- Login Form -->
    <div class="form-container sign-in">
      <form action="" method="post">
        <h1>Sign In</h1>
        <input type="text" name="username" placeholder="Username" required />
        <div class="password-container">
          <input type="password" name="password" id="login_password" placeholder="Password" required />
          <button type="button" class="toggle-password" onclick="togglePassword('login_password', this)">🙈</button>
        </div>

        <a href="forgot_password.php" id="forgotPassword">Forgot your password?</a>
        <button type="submit" name="login">Login</button>
      </form>
    </div>

    <!-- Toggle Panels -->
    <div class="toggle-container">
      <div class="toggle">
        <div class="toggle-panel toggle-left">
          <h1>Welcome Back!</h1>
          <p>Login to access your account</p>
          <button class="hidden" id="login">Sign In</button>
        </div>
        <div class="toggle-panel toggle-right">
          <h1>Hello, Friend!</h1>
          <p>
            <span>Don't have an account?</span><br />
            <span>Sign up and join us!</span>
          </p>
          <button class="hidden" id="register">Sign Up</button>
        </div>
      </div>
    </div>
  </div>

  <script src="logreg.js"></script>
</body>

</html>
