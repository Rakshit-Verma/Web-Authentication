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
    <form method="post" action="addpublications.php">
        <fieldset>
            <label for="publication">Add Publication </label><br>
            <textarea name="body" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Add">
        </fieldset>
    </form>
</body>

</html>