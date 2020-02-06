<?php
// Include config file
session_start();
require_once "dbconnect.php";

// Define variables and initialize with empty values
$username = $password = "";

if (isset($_SESSION['user'])) {
    header('Location: home.php');
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
    $email = $_POST['email'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];
    $resultt = $db->faculty->findOne(array('username' => $username));
    if (!$resultt) {
        $result = $db->faculty->insertOne(array(
            'username' => $username, 
            'password' => $password,
            'email' => $email,
            'department' => $department,
            'contact' => $contact
        ));
        header('Location: login.php');
    } else {
        echo 'Account already in use';
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
    <title>Sign Up</title>
</head>

<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?php echo $username; ?>">
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Department</label>
                <input type="text" name="department" class="form-control" value="<?php echo $username; ?>">
            </div>
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" value="<?php echo $username; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>
</body>

</html>