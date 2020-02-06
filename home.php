<?php
session_start();
require_once('dbconnect.php');
//not signed
if (!isset($_SESSION['user'])) {
    // header("Location: login.php");
}

$userData = $db->faculty->findOne(array('_id' => new MongoDB\BSON\ObjectID($_SESSION['user'])));

?>

<html>

<head>
    <title>Home</title>
</head>

<body>
    <?php include('header.php'); ?>
    <a href="addpub.php">Add Publications<br>
        <a href="addawa.php">Add Awards<br>
</body>

</html>