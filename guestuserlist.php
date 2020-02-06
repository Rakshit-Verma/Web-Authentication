<?php

session_start();
require_once("dbconnect.php");

function get_user_list($db)
{
    $result = $db->faculty->find();
    $users = iterator_to_array($result);
    return $users;
}

?>

<html>

<head>
    <title>Users</title>
</head>

<body>
    <?php include('guestheader.php'); ?>
    <div>
        <p><b>List of users</b></p>
        <?php
        $user_list = get_user_list($db);
        foreach ($user_list as $user) {
            echo '<span>' . $user['username'] . '</span>';
            echo '[<a href = "guestprofile.php?id=' . $user['_id'] . '">Visit Profile</a>]';
            echo '<hr>';
        }
        ?>
    </div>
</body>

</html>