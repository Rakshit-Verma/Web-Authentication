<?php
// Include config file
session_start();
require_once "dbconnect.php";

// Define variables and initialize with empty values
$username = $password = "";

if (isset($_SESSION['user'])) {
    header('Location: home.php');
}

if (isset(($_POST['username'])) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
    $result = $db->faculty->findOne(array('username' => $username, 'password' => $password));
    if (!$result) {
        echo 'Wrong username or password';
    } else {
        $_SESSION['user'] = $result->_id;
        header('Location: home.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body {
            font: 14px sans-serif;
        }

        .wrapper {
            width: 350px;
            padding: 20px;
        }
    </style>
    <title>Login</title>
</head>

<body>
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
            <p><a href="guestuserlist.php">Log In as guest</a></p>
        </form>
    </div>
</body>

</html>